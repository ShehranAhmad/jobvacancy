@extends('layouts.login')
@section('title', 'Login')
@section('content')

    <div class="col-lg-5 shadow p-0 col-md-6">
        <div class="card login-page bg-white shadow rounded border-0">
            <div class="card-body">
                <h4 class="card-title text-center">Signup</h4>
                <!-- Session Status -->
                <x-auth-session-status class="mb-1 p-2 bg-success text-white" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-1 p-2 bg-danger text-white" :errors="$errors" />
                <form class="login-form px-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-icon position-relative">
                                    <i data-feather="user" class="fea icon-sm icons"></i>
                                    <input type="text" class="form-control ps-5" placeholder="Full Name" name="name" required="">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-icon position-relative">
                                    <i data-feather="mail" class="fea icon-sm icons"></i>
                                    <input type="email" class="form-control ps-5" placeholder="Email" name="email" required="">
                                </div>
                            </div>
                        </div><!--end col-->

                        <div class="col-md-12">
                            <div class="mb-3">
                                <div class="form-icon position-relative">
                                    <i data-feather="key" class="fea icon-sm icons"></i>
                                    <input type="password" class="form-control ps-5" name="password" placeholder="Password" required="">
                                </div>
                            </div>
                        </div><!--end col-->

                      {{--  <div class="col-md-12">
                            <div class="mb-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">I Accept <a href="#" class="text-primary">Terms And Condition</a></label>
                                </div>
                            </div>
                        </div><!--end col-->--}}

                        <div class="col-md-12 mt-2">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div><!--end col-->

                        <div class="col-lg-12 mt-3 text-center">
                            <h6>Or Signup With</h6>
                            <div class="row">
                               {{-- <div class="col-6 mt-2">
                                    <div class="d-grid">
                                        <a href="javascript:void(0)" class="btn btn-light"><i class="mdi mdi-facebook text-primary"></i> Facebook</a>
                                    </div>
                                </div><!--end col-->--}}

                                <div class="col-12 mt-2">
                                    <div class="d-grid">
                                        <a href="{{route('google')}}" class="btn btn-light"><i class="mdi mdi-google text-danger"></i> Google</a>
                                    </div>
                                </div><!--end col-->
                            </div>
                        </div><!--end col-->

                        <div class="mx-auto">
                            <p class="mb-0 mt-3"><small class="text-dark me-2">Already have an account ?</small> <a href="{{route('login')}}" class="text-dark fw-bold">Sign in</a></p>
                        </div>


                    </div><!--end row-->
                </form>

            </div>
        </div><!---->
    </div> <!--end col-->



@endsection

