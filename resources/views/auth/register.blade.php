<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Імʼя')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            @if($errors->get('email'))
                <x-input-error :messages="['Ця пошта вже зареєстрована у системі!']" class="mt-2" />
             @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Пароль')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            @if($errors->get('password'))
                @if ($errors->get('password')[0] == 'The password field must be at least 8 characters.')
                    <x-input-error :messages="['Пароль має мати як мінімум 8 символів!']" class="mt-2" />
                @elseif($errors->get('password')[0] == 'The password field confirmation does not match.')
                    <x-input-error :messages="['Поле паролю і підтвердження паролю не співпадають!']" class="mt-2" />
                @endif
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Підтвердити пароль')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                Вже зареєстровані?
            </a>

            <x-primary-button class="ms-4">
                Зареєструватись
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
