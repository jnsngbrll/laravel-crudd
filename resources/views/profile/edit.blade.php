<x-app-layout>
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>Web Developer</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">{{ __('Profile Details') }}</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Full Name</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8">Web Developer</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                                    @csrf
                                </form>

                                <!-- Profile Edit Form -->
                                <form method="post" action="{{ route('profile.update') }}">
                                    @csrf @method('patch')

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="assets/img/profile-img.jpg" alt="Profile" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <x-input-label for="name" :value="__('Full Name')" class="col-md-4 col-lg-3 col-form-label" />
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" class="form-control" />
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <x-input-label for="email" :value="__('Email')" class="col-md-4 col-lg-3 col-form-label" />
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" class="form-control" />
                                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                                        </div>

                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                            <div>
                                                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                                    {{ __('Your email address is unverified.') }}

                                                    <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                        {{ __('Click here to re-send the verification email.') }}
                                                    </button>
                                                </p>

                                                @if (session('status') === 'verification-link-sent')
                                                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                    </p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                    <div class="text-center">
                                        <x-primary-button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</x-primary-button>
                                        @if (session('status') === 'profile-updated')
                                            <p 
                                                x-data="{ show: true }" 
                                                x-show="show" 
                                                x-transition 
                                                x-init="setTimeout(() => show = false, 2000)" 
                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Saved.') }}
                                            </p>
                                        @endif
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                    @csrf
                                    @method('put')

                                    <div class="row mb-3">
                                        <x-input-label for="update_password_current_password" :value="__('Current Password')" class="col-md-4 col-lg-3 col-form-label" />
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"  class="form-control" />
                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <x-input-label for="update_password_password" :value="__('New Password')" class="col-md-4 col-lg-3 col-form-label" />
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_password" name="password" type="password" autocomplete="new-password"  class="form-control" />
                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <x-input-label for="update_password_password_confirmation" :value="__('Re-enter New Password')" class="col-md-4 col-lg-3 col-form-label" />
                                        <div class="col-md-8 col-lg-9">
                                            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"  class="form-control" />
                                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <x-primary-button type="submit" class="btn btn-primary">{{ __('Change Password') }}</x-primary-button>

                                        @if (session('status') === 'password-updated')
                                            <p
                                                x-data="{ show: true }"
                                                x-show="show"
                                                x-transition
                                                x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400"
                                            >{{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                                </form>
                                <!-- End Change Password Form -->
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
