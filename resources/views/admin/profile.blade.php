@extends('layouts.admin')
@section('title','Admin Profile')
@section('heading','Profile Info')


@section('content')

<!-- users edit start -->
<section class="users-edit">
    <div class="card">
        <div class="card-content">
            <div class="card-body">

                <div class="">
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <form method="post" action="{{ route('admin.update.profile') }}" data-parsley-validate="" enctype="multipart/form-data" id="profile-form" class="cmxform">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="file" name="image" class="form-control dropify" data-default-file="{{asset(Auth::User()->avatar)}}" data-allowed-file-extensions='["png", "jpeg", "jpg"]' accept="image/png, image/jpeg, image/jpg">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Name" value="{{Auth::User()->name}}" required
                                                data-validation-required-message="This name field is required">
                                                @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="email"
                                                name="email" value="{{Auth::User()->email}}" required
                                                data-validation-required-message="This email field is required">
                                                @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Password</label>
                                            <input type="password" minlength="8" class="form-control" placeholder="Password"
                                                   name="password"
                                                   data-validation-required-message="">
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Password</label>
                                            <input type="password" minlength="8" class="form-control" placeholder="Confirm Password"
                                                   name="password_confirmation"
                                                   data-validation-required-message="">
                                            @error('password_confirmation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit"
                                        class="btn btn-relief-primary ">Save
                                        Changes</button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- users edit ends -->

@endsection
@section('js')
    <script src="{{asset('assets/admin/js/parsley.js')}}"></script>
    <script>
        $(document).ready(function (){
            $('.dropify').dropify();
        })
    </script>


@endsection
