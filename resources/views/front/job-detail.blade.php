@extends('layouts.front')
@section('title', 'Job Detail')
@section('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

@endsection
@section('content')
@php
$company=$job->company;
@endphp
    <!-- Hero Start -->
    <section class="bg-half  d-table w-100" style="background: url('{{asset('front/images/account/bg.png')}}') center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <a href="{{route('company.detail',$company->slug)}}">
                            <img src="{{asset($company->avatar??'front/images/job/Gradle.svg')}}" class="avatar avatar-small" alt="">
                            <h4 class="title text-capitalize mt-4 mb-3">{{$company->name}}</h4>
                        </a>
                        <ul class="list-unstyled">
                            <li class="list-inline-item text-primary me-3"><i class="mdi mdi-map-marker text-warning me-2"></i>{{$company->company_detail->address}}</li>
{{--                            <li class="list-inline-item text-primary"><i class="mdi mdi-office-building text-warning me-2"></i>Gradle</li>--}}
                        </ul>

                    </div>
                </div>  <!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->

    <!-- Shape Start -->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!--Shape End-->

    <!-- Job Detail Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="card sidebar sticky-bar rounded   shadow-lg border-0">
                        <div class="card-body   border-bottom">
                            <h5 class="mb-0">Job Information</h5>
                        </div>

                        <div class="card-body">
                            <div class="d-flex widget align-items-center">
                                <i data-feather="user-check" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Employee Type:</h6>
                                    <p class="text-primary mb-0">{{$job->employee_type}}</p>
                                </div>
                            </div>
                            <div class="d-flex widget align-items-center mt-3">
                                <i data-feather="book" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Level:</h6>
                                    <p class="text-primary mb-0">Junior</p>
                                </div>
                            </div>


                            <div class="d-flex widget align-items-center mt-3">
                                <i data-feather="map-pin" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Location:</h6>
                                    <p class="text-primary mb-0">{{$job->address}}</p>
                                </div>
                            </div>
                            @if($job->experience)
                            <div class="d-flex widget align-items-center mt-3">
                                <i data-feather="briefcase" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Experience:</h6>
                                    <p class="text-primary mb-0">{{$job->experience}}</p>
                                </div>
                            </div>
                            @endif

                            @if($job->salary)
                            <div class="d-flex widget align-items-center mt-3">
                                <i data-feather="dollar-sign" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Salary:</h6>
                                    <p class="text-primary mb-0">{{$job->salary}}</p>
                                </div>
                            </div>
                            @endif
                            <div class="d-flex widget align-items-center mt-3">
                                <i data-feather="clock" class="fea icon-ex-md me-3"></i>
                                <div class="flex-1">
                                    <h6 class="widget-title mb-1">Date posted:</h6>
                                    <p class="text-primary mb-0 mb-0">{{date('d M Y',strtotime($job->created_at))}}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-7 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="ms-lg-4">
                        <h5 class="text-primary mb-3">{{$job->title}}</h5>
                        <h6>Skills : &nbsp;&nbsp;&nbsp;
                            @php
                                $skills=explode(',',$job->category)
                            @endphp
                           @foreach($skills as $skill)
                                <span class="badge bg-soft-primary">{{$skill}}</span>
                           @endforeach
                        </h6>
                    </div>
                    <div class="ms-lg-4">
                        <h5>Job Description: </h5>
                        <p class="mb-0">{!! $job->description !!}</p>
                        @if($job->link)
                            <div class="mt-4">
                                <a href="#" id="apply" data-url="{{$job->link}}" class="btn btn-outline-primary">Apply Now <i class="mdi mdi-send"></i></a>
                            </div>
                        @endif
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- Job Detail End -->







    @endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#apply').click(function () {
                let url=$(this).data('url');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to apply on it!",
                    icon: 'success',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, apply it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.open(url, '_blank');
                    }
                })
            });
        });
    </script>

    @endsection
