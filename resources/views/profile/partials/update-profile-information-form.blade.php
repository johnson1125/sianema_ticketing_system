<section>
    <header>
        <h2 class="user-profile-text text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="user-profile-text mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update', ['name' => $user->name, 'role' => $user->hasRole('Admin') ? 'Admin' : 'User']) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="user-profile-text" for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="user-profile-input-fields mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label class="user-profile-text" for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="user-profile-input-fields mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="btn-primary-light underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
                @endif
            </div>
            @endif
        </div>

        <!-- Mobile Number -->
        <div>
            <x-input-label class="user-profile-text" for="mobile_number" :value="__('Mobile Number')" />
            <x-text-input id="mobile_number" name="mobile_number" type="text" class="user-profile-input-fields mt-1 block w-full" :value="old('mobile_number', $user->mobile_number)" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('mobile_number')" />
        </div>


        <!-- Date of Birth -->
        <div>
            <x-input-label class="user-profile-text" for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" name="date_of_birth" type="date" class="user-profile-input-fields mt-1 block w-full" :value="old('date_of_birth', $user->date_of_birth)" required />
            <x-input-error class="mt-2" :messages="$errors->get('date_of_birth')" />
        </div>


        <!-- Profile Photo -->
        <!-- Profile Photo Upload -->
        <div>
            <x-input-label class="user-profile-text" for="profile_photo" :value="__('Profile Photo')" />
            <x-text-input id="profile_photo" name="profile_photo" type="file" class="bg-white text-black user-profile-input-fields mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profile_photo')" />
        </div>

        <!-- Display Current Profile Photo (if exists) -->
        @if (Auth::check() && $user->profile_photo)
        <div>
            <img src="{{ route('profile.photo', ['userId' => Auth::user()->id]) }}" alt="{{ Auth::user()->name . "'s Profile Photo"  }}" class="rounded-full h-20 w-20 object-cover">
        </div>
        @else
        <div>
            <img src="{{ asset('images/default-profile-pic.png') }}" alt="Profile Photo" class="rounded-full h-20 w-20 object-cover">
        </div>
        @endif


        <div class="flex items-center gap-4">
            <x-primary-button class="btn-primary-light">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="user-profile-text text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>