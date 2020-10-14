<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
             <img class="img-fluid text-center" style="width:10%;margin-left:45%" src="{{asset('/images/logo.png')}}" alt="Logo" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div>
                <x-jet-label value="{{ __('Phone') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>
            <div>
                <x-jet-label value="{{ __('Country') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="country_name" :value="old('country_name')" required autofocus autocomplete="country_name" />
            </div>
            <div>
                <x-jet-label value="{{ __('City') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="city_name" :value="old('city_name')" required autofocus autocomplete="city_name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/login"><strong> {{ __("Have Yout Allready an Account ? Login Now") }}</strong></a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
