<x-guest-layout>
<div style="background: url(https://4.bp.blogspot.com/-Z93g1-tbuQQ/WXXK1bsZgPI/AAAAAAAAlds/mqlV_gjbqfouz--BeHRaCJFdk4kt4CixgCLcBGAs/s1600/harvard%2Buniversity%2B6.jpg) center top no-repeat; margin:  auto; padding: 0px 10px 20px; height: auto;  width: auto; ">


    <x-jet-authentication-card>
        <x-slot name="logo">
            
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <br>
            <div class="flex-shrink-0 flex items-center">
                <img src="https://img.icons8.com/fluency/96/undefined/university.png"/>                
                <p class="pl-3 font-serif text-4xl text-gray-800 font-medium">Manila University</p>
            </div> <br>

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</div>
</x-guest-layout>
