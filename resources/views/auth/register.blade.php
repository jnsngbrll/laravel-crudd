<x-guest-layout>
    <img src="illustrations/register.png" alt="register-image" class="hidden sm:block w-1/2">
    
    <div>
        <h1 class="text-2xl font-black text-blue-400 text-center mb-4">Register</h1>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-8">
            @csrf

            <div class="space-y-4">
                <div class="flex gap-x-4">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" 
                                        type="text" 
                                        name="name" 
                                        :value="old('name')" 
                                        required 
                                        autofocus 
                                        autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" 
                                        type="email" 
                                        name="email" 
                                        :value="old('email')" 
                                        required 
                                        autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" 
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" 
                                    required 
                                    autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>
            </div>

            <div class="flex flex-col gap-y-4">
                <x-primary-button>
                    {{ __('Register') }}
                </x-primary-button>

                <p class="font-medium text-sm text-gray-700 dark:text-gray-400 text-center"
                    >Have an account? 
                    <a class="text-blue-400 font-bold hover:underline" href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
