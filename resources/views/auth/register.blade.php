<x-guest-reg>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="">
            <x-input-label class="text-white text-xl" for="name" :value="__('Name')" />
            <x-text-input id="name" class="text-white block mt-1 w-full box-none" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4 place-items-center">
            <x-input-label class="text-white text-xl" for="email" :value="__('Email')" />
            <x-text-input id="email" class="text-white block mt-1 w-full box-none" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 place-items-center">
            <x-input-label class="text-white text-xl" for="password" :value="__('Password')" />

            <x-text-input id="password" class="text-white block mt-1 w-full box-none" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 place-items-center">
            <x-input-label class="text-white text-xl" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="text-white block mt-1 w-full box-none" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center mt-4">
            <a class="underline text-sm font-semibold text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-3 bg-white bg-opacity-50 hover:bg-opacity-40">
                {{ __('sign up') }}
            </x-primary-button>
        </div>
    </form>
    <style>
        .box-none {
            background: transparent;
            border-radius: 0;
            border: none;
            border-bottom: solid 2px white;
        }
    </style>
</x-guest-reg>
