<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                <img src="{{ asset('storage/hulk-apps-logo-nav.jpg') }}" class="h-14">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full focus:ring-hulk-green-50 focus:border-hulk-green" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full focus:ring-hulk-green-50 focus:border-hulk-green" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full focus:ring-hulk-green-50 focus:border-hulk-green"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="bg-hulk-green hover:bg-hulk-green-600">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
