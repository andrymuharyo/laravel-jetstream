<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('label.name.name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="{{ __('label.name.placeholder') }}" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="username" value="{{ __('label.username.name') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" placeholder="{{ __('label.username.placeholder') }}" :value="old('username')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('label.email.name') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="{{ __('label.email.placeholder') }}" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('label.password.name') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" placeholder="{{ __('label.password.placeholder') }}" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('label.password_confirmation.name') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="{{ __('label.password_confirmation.placeholder') }}" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('auth.registered') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('action.register.name') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
