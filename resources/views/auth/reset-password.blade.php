@extends('layouts.login')
@section('title', 'Reset Password')
@section('content')

    <div class="col-lg-5 shadow p-0 col-md-6">
        <div class="card shadow rounded border-0">
            <div class="card-body">
                <h4 class="card-title text-center">Recover Account</h4>
                <x-auth-session-status class="mb-4 text-white p-2 bg-success" :status="session('status')" />
                <x-auth-validation-errors class="mb-4 text-white p-2 bg-danger" :errors="$errors" />

                <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <label for="email" >Email</label>

                        <input id="email" placeholder="Email" class="form-control mt-1 w-full" type="email" name="email" value="{{$request->email}} " required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <label for="password" >Password</label>

                        <input id="password" minlength="8" class="form-control mt-1 w-full" type="password" name="password" placeholder="New Password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-2">
                        <label for="password_confirmation">Confirm Password</label>

                        <input id="password_confirmation" minlength="8" class="form-control  mt-1 w-full" placeholder="Confirm Password"
                                 type="password"
                                 name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



                @endsection





{{--






    <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
--}}
