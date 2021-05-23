@extends('layouts.user')
@section('title', 'Profile')

@section('css')
    <link href="{{asset('front/dropify/dropify.min.css')}}" rel="stylesheet">
    <style>
        .select2-container .select2-selection--single{
            height: 40px!important;
        }
    </style>
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 col-12 mt-1 pt-2">
            <h4 style="border-bottom: 1.5px solid">Profile</h4>
            <div class="row">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <h5 class="text-md-start text-center">Personal Detail :</h5>

                        <div class="mt-3 text-md-start text-center ">
                            <form action="{{route('employee.update.picture')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                        <div class="col-lg-4 col-md-5 col-sm-12 col-12">
                                            <div class="form-group">
                                                <div>
                                                    <input type="file" name="avatar" required class="dropify " data-default-file="{{asset($user->avatar)}}"  />
                                                    @csrf
                                                </div>
                                                @error('avatar')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-5 mt-md-5 col-md-6 col-sm-12 col-12">
                                        <div class="btn-group">
                                            <button type="submit"  class="btn btn-primary mt-2">Update Profile</button>
                                            <a href="{{route('employee.delete.pic')}}" class="btn btn-danger mt-2 ">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form method="post" action="{{route('employee.update.profile')}}">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Full Name</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <input name="name" id="first" value="{{$user->name}}" type="text" required class="form-control ps-5" placeholder="Full Name :">
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <input name="email" id="email" value="{{$user->email}}" required type="email" class="form-control ps-5" placeholder="Your email :">
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone No. :</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                            <input name="number" id="number" value="{{$user->phone}}" type="tel" class="form-control ps-5" placeholder="Phone :">
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address :</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe fea icon-sm icons"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                                            <input name="address" value="{{$user->employee_detail->address??""}}" id="number" type="text" class="form-control ps-5" placeholder="City Address :">
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Skills :</label>
                                        <div class="form-icon position-relative">
                                            @php
                                                $all_skills=explode(',',$user->employee_detail->skills);
                                            @endphp
                                            <select name="skills[]"  class="form-control select2" multiple="multiple" data-live-search="true">
                                                <option disabled  value="">Choose Skills</option>
                                                @foreach($skills as $skill)
                                                    <option @foreach($all_skills as $ski) {{$ski==$skill->name?'selected':''}} @endforeach value="{{$skill->name}}">{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!--end col-->

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label class="form-label">About</label>
                                        <div class="form-icon position-relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle fea icon-sm icons"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                            <textarea name="about" id="comments" rows="4" class="form-control ps-5" placeholder="About yourself :">{!! $user->employee_detail->about??"" !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end row-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit" id="submit"  class="btn btn-primary">Save Changes</button>
                                </div><!--end col-->
                            </div><!--end row-->
                        </form><!--end form-->

                        @if(auth()->user()->auth_provider=='site')
                        <div class="row">
                            <div class="col-md-12 mt-4 pt-2">
                                <h5>Change password :</h5>
                                <form method="post" action="{{route('employee.update.password')}}">
                                    @csrf
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Old password :</label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                    <input type="password" name="old_password"  class="form-control ps-5" placeholder="Old password" required="">
                                                </div>
                                                @error('old_password')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">New password :</label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                    <input type="password" name="password" class="form-control ps-5" minlength="8" placeholder="New password" required="">
                                                </div>
                                                @error('password')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Re-type New password :</label>
                                                <div class="form-icon position-relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key fea icon-sm icons"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                                                    <input type="password" name="confirm_password" minlength="8" class="form-control ps-5" placeholder="Re-type New password" required="">
                                                </div>
                                                @error('confirm_password')
                                                <strong class="text-danger">{{$message}}</strong>
                                                @enderror
                                            </div>
                                        </div><!--end col-->

                                        <div class="col-lg-12 mt-2 mb-0">
                                            <button type="submit" class="btn btn-primary">Update password</button>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form>
                            </div><!--end col-->
                        </div><!--end row-->
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>




    @endsection
@section('js')
    <script src="{{asset('front/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('front/dropify/form-fileuploads.init.js')}}"></script>


@endsection
