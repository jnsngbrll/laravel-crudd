<x-guest-layout>
    <img src="illustrations/forgot-password.png" alt="forgot-password-image" class="hidden sm:block w-1/2">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-full">
        <h1 class="text-2xl font-black text-blue-400 text-center mb-4">Forgot Password</h1>
        
        <form method="POST" action="{{ route('password.email') }}" class="space-y-8">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Your Email')" />
                <x-text-input id="email" 
                                type="email" name="email" 
                                :value="old('email')" 
                                required 
                                autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>
            <div class="flex flex-col gap-y-4">
                <x-primary-button>
                    {{ __('Submit') }}
                </x-primary-button>
                <a href="/login" class="font-medium text-sm text-gray-700 dark:text-gray-400 hover:underline"> 
                    {{ __('Go back') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
