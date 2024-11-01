<!-- Author: Lim Yu Her  -->
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label class="input-fields" for="name" :value="__('Name')" />
            <x-text-input id="name" class="text-inputs block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="input-fields" for="email" :value="__('Email')" />
            <x-text-input id="email" class="text-inputs block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mobile Number -->
        <div class="mt-4">
            <x-input-label class="input-fields" for="mobile_number" :value="__('Mobile Number')" />
            <x-text-input id="mobile_number" class="text-inputs block mt-1 w-full" type="text" name="mobile_number" :value="old('mobile_number')" placeholder="0123456789" required />
            <x-input-error :messages="$errors->get('mobile_number')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label class="input-fields" for="date_of_birth" :value="__('Date of Birth')" />
            <x-text-input id="date_of_birth" class="text-inputs block mt-1 w-full" type="date" name="date_of_birth" :value="old('date_of_birth')" required />
            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="input-fields" for="password" :value="__('Password')" />

            <x-text-input id="password" class="text-inputs block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="input-fields" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="text-inputs block mt-1 w-full"
                type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="links underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="btn-primary ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>