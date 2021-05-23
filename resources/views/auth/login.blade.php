@extends('layouts.login')
@section('title', 'Login')
@section('content')

    <div class="col-lg-5 shadow p-0 col-md-6">
        <div class="card login-page bg-white shadow rounded border-0">
            <div class="card-body">
                <h4 class="card-title text-center">Login</h4>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4 p-2 bg-success text-white" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4 p-2 bg-danger text-white" :errors="$errors" />
                <form class="login-form p-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="form-icon position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                    <input type="password" name="password" class="form-control ps-5" placeholder="Password" required="">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12">
                            <div class="d-flex justify-content-between">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" id="remember_me" name="remember" type="checkbox" value="" id="flexCheckDefault4">
                                        <label class="form-check-label" for="flexCheckDefault4">Remember me</label>
                                    </div>
                                </div>
                                <p class="forgot-pass mb-0"><a href="{{route('password.email')}}" class="text-dark fw-bold">Forgot password ?</a></p>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 mb-0">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-12 mt-2 text-center">
                            <h6>Or Login With</h6>
                            <div class="row">
                                <div class="col-12 ">
                                    <div class="d-grid">
                                        <a href="{{route('google')}}" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> Google</a>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div>
                    </div><!--end row-->
                </form>

            </div>
        </div><!---->
    </div> <!--end col-->



@endsection

