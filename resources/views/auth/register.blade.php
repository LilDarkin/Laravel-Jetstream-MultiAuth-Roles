<x-guest-layout>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <div style="background: url(https://4.bp.blogspot.com/-Z93g1-tbuQQ/WXXK1bsZgPI/AAAAAAAAlds/mqlV_gjbqfouz--BeHRaCJFdk4kt4CixgCLcBGAs/s1600/harvard%2Buniversity%2B6.jpg) center no-repeat; margin:  auto; padding: 0px 10px 20px; height: 100%; width: 100%; ">


        <x-jet-authentication-card>
            <x-slot name="logo">

            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" x-data="{role_id: 2}" enctype="multipart/form-data">
                @csrf

                <div class="flex-shrink-0 flex items-center">
                    <img src="https://img.icons8.com/fluency/96/undefined/university.png" />
                    <p class="pl-3 font-serif text-4xl text-gray-800 font-medium">Manila University</p>
                </div>

                <div class="mt-4 mb-4">
                    <x-jet-label for="role_id" value="{{ __('Register as:') }}" />
                    <select name="role_id" x-model="role_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="2">Student</option>
                        <option value="3">Teacher</option>
                    </select>
                </div>

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
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

                <div class="mt-4">
                    <x-jet-label for="student_address" value="{{ __('Address') }}" />
                    <x-jet-input id="address" class="block mt-1 w-full" type="text" :value="old('address')" name="address" />
                </div>

                <div class="mt-4" x-show="role_id == 2">
                    <x-jet-label for="year" value="{{ __('Year Level') }}" />
                    <select name="year" id="year" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="NULL">Year Level</option>
                        <option value="1st year">1st year</option>
                        <option value="2nd year">2nd year</option>
                        <option value="3rd year">3rd year</option>
                        <option value="4th year">4th year</option>
                        <option value="5th year">5th year</option>
                        <option value="Irregular">Irregular</option>
                    </select>
                </div>

                <div class="mt-4" x-show="role_id == 2">
                    <x-jet-label for="student_number" value="{{ __('Student Number') }}" />
                    <x-jet-input id="student_number" class="block mt-1 w-full" type="number" :value="old('student_number')" name="student_number" />
                </div>

                <div class="mt-4" x-show="role_id == 3">
                    <x-jet-label for="teacher_license" value="{{ __('Teacher License') }}" />
                    <div class="custom-file">
                        <x-jet-input class="block mt-1 w-full" type="file" name="teacher_license" class="custom-file-input" id="teacher_license" />
                        <label class="custom-file-label" for="teacher_license">Select file</label>
                    </div>

                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </x-jet-authentication-card>
    </div>
</x-guest-layout>