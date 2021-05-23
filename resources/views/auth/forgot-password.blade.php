@extends('layouts.login')
@section('title', 'Forget Password')
@section('content')


    <div class="col-lg-5 shadow p-0 col-md-6">
        <div class="card shadow rounded border-0">
            <div class="card-body">
                <h4 class="card-title text-center">Recover Account</h4>
                <x-auth-session-status class="mb-4 text-white p-2 bg-success" :status="session('status')" />
                <x-auth-validation-errors class="mb-4 text-white p-2 bg-danger" :errors="$errors" />

                <form  class="login-form mt-4" method="POST" action="{{ route('email.password') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="text-muted">Please enter your email address. You will receive a link to create a new password via email.</p>
                            <div class="mb-3">
                                <label class="form-label">Email address <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" class="form-control ps-5" placeholder="Enter Your Email Address" name="email" required="">
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div><!--end col-->
                        <div class="mx-auto">
                            <p class="mb-0 mt-3"> <a href="{{route('login')}}" class="text-primary fw-bold">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!--end col-->

    <!-- Session Status -->




    @endsection



