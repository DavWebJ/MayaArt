<x-guest-layout>


        
        <form method="POST" id="form-login" action="{{ route('register') }}">
            <a href="{{route('home')}}"><img  class="login-logo" src="{{asset('img/logo-noir.svg')}}" alt=""></a>
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nom') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="prenom" value="{{ __('Prenom') }}" />
                <x-jet-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus autocomplete="prenom" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                <p>J'accepte les <a href="{{ route('terms.show') }}" target="_blank">conditions d'utilisation</a> et <a href="{{ route('policy.show') }}" target="_blank">la politique de confidentialité</a></p>
                                
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif
                <div class="mt-4">
                <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" name="newsletter" id="newsletter" value="0">
                    <label class="merriweather text-gray-700" for="newsletter" style="font-size: 14px">J'accepte de m'abonner à la newsletter</label>
                    
                </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
        
        <x-jet-validation-errors class="mb-4" />
</x-guest-layout>
