<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <img src="illustrations/login.png" alt="login-image" class="hidden sm:block w-1/2">
    
    <div class="w-full">    
        <h1 class="text-2xl font-black text-blue-400 text-center mb-4">Log In</h1>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-8">
            @csrf
 
            <div class="space-y-4">
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" 
                                    type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    required 
                                    autofocus 
                                    autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" 
                                    type="password"
                                    name="password"
                                    required 
                                    autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" class="rounded text-blue-400 shadow-sm focus:ring-0" name="remember">
                        <span class="text-sm text-gray-700 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 dark:text-gray-400 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="flex flex-col gap-y-4">
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>

                <p class="font-medium text-sm text-gray-700 dark:text-gray-400 text-center"
                    >Don't have an account? 
                    <a href="/register" class="text-blue-400 font-bold hover:underline"> 
                        {{ __('Register') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
