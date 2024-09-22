<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\virustotal;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;



class ProfileController extends Controller
{
    protected $totalVirusService;

    public function __construct()
    {
        $this->totalVirusService = new virustotal("e5566ae78658e232975bb111c5519a0b7ae84d58f7eae0c5a056eba7008bbc29");
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validated();

        $profilePhotoFile = $request->file('profile_photo');

        if ($profilePhotoFile) {
            $this->checkVirus($profilePhotoFile);
        }

        // Store the image as binary data
        $profilePhoto = $request->profile_photo;
        if ($profilePhoto != null && $profilePhoto->isValid()) {
            $user->profile_photo = $profilePhoto->getContent();
        }

        $fieldsToUpdate = ['name', 'email', 'mobile_number', 'date_of_birth'];

        $user->fill(Arr::only($validated, $fieldsToUpdate)); // Avoid updating profile_photo here.

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }


        $user->save();

        return Redirect::route('profile.edit', ['name' => $request->user()->name, 'role' => $request->user()->hasRole('Admin') ? 'Admin' : 'User'])->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function checkVirus($file)
    {
        $filePath = $file->getRealPath();
        $res = $this->totalVirusService->checkFile($filePath);

        switch ($res) {
            case -99: // API limit exceeded
                return redirect()->back()->with('error', 'Limit exceeded.');


            case -1: // an error occurred
                return redirect()->back()->with('error', 'Unknown error occurred, please try again.');


            case 0: // no results (yet) – but the file is already enqueued at VirusTotal
                $scan_id = $this->totalVirusService->getScanId();
                $json_response = $this->totalVirusService->getResponse();
                break;

            case 1: // results are available
                $json_response = json_decode($this->totalVirusService->getResponse(), true);
                //dd($json_response)
                if ($json_response['positives'] > 0) {
                    // If the file contains a virus
                    return redirect()->back()->with('error', 'The file ' . $file->getClientOriginalName() . ' contains a virus. Operation blocked.');
                }
                break;

            default:
                return redirect()->back()->with('error', 'Unknown error occurred, please try again.');
        }
    }

    public function showProfilePhoto($userId)
    {
        Log::info("Requested ID: " . $userId);

        $user = User::findOrFail($userId);
        $profilePhotoData = $user->profile_photo;

        // Determine the content type dynamically
        $imageInfo = getimagesizefromstring($profilePhotoData);
        if ($imageInfo === false) {
            abort(404); // If the data is not a valid image
        }

        // Get the MIME type
        $mimeType = $imageInfo['mime'];

        // Return the binary data as a response with the correct headers
        return response()->make($profilePhotoData, 200)
            ->header('Content-Type', $mimeType); // Adjust type as necessary
    }
}
