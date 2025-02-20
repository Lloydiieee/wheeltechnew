<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        {{-- <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <!-- Name Input -->
            <div class="form-group">
                <label for="name">Complete Name</label>
                <x-input type="text" name="name" class="form-control" id="name" placeholder="Enter your name here.." value="{{ old('name') }}"/>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Email Input -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <x-input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address here.." value="{{ old('email') }}"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Password</label>
                <x-input type="password" name="password" class="form-control" id="password" placeholder="Enter your password here.."/>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Confirm Password Input -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <x-input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm your password here.."/>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Account Type</label>
                <select required name="account_type" id="account_type" class="form-select">
                    <option value="" selected disabled>-</option>
                    <option value="Administrator">Administrator</option>
                    <option value="">Applicant</option>
                    <option value="Recipient">Loan Recipient</option>
                    <option value="Lender">Lender (In-Charge)</option>
                </select>
                @error('account_type')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
    
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form> --}}

        <form method="POST" class="w-full" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif
            <br>
            <input type="checkbox" id="terms">&ensp;
            <label for="terms">Agree & Read <a href="" class="text-red-800">Terms & Conditions</a></label>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>


    </x-authentication-card>
</x-guest-layout>
