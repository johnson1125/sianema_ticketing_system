<?php
//  Author: Lim Yu Her
namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'mobile_number' => [
                'required',
                'string',
                'regex:/^(01[0-9]{1}[0-9]{8}|01[0-9]{1}[0-9]{7})$/', // Regex for Malaysian mobile numbers
            ],
            'date_of_birth' => ['required', 'date'],
            'profile_photo' => [
                'nullable',  // Allow the field to be null (optional)
                'image',     // Ensure the uploaded file is an image
                'max:5120',  // Limit the file size to 5120 kilobytes (5 MB)
                'mimes:jpeg,jpg,png,gif' // specify allowed image formats
            ],
        ];
    }
}
