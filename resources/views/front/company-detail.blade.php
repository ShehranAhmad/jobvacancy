@extends('layouts.front')
@section('title', 'Company Detail')
@section('css')

@endsection
@section('content')

    <!-- Hero Start -->
    <section class="bg-half  d-table w-100" style="background: url('{{asset('front/images/account/bg.png')}}') center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <a href="{{route('company.detail')}}">
                            <img src="{{asset($company->avatar)}}" class="avatar avatar-small" alt="">
                            <h4 class="title mt-4 mb-3">{{$company->name}}</h4>
                        </a>
                        <ul class="list-unstyled">
                            <li class="list-inline-item text-primary me-3"><i class="mdi mdi-map-marker text-warning me-2"></i>{{$company->company_detail->address}}</li>
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


    <!-- Start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <ul class="nav nav-pills nav-justified flex-column bg-white rounded  shadow-lg p-3 mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link rounded active" id="dashboard" data-bs-toggle="pill" href="#dash" role="tab" aria-controls="dash" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"><i class="uil uil-dashboard h5 align-middle me-2 mb-0"></i>About</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                        <li class="nav-item mt-2">
                            <a class="nav-link rounded" id="order-history" data-bs-toggle="pill" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                                <div class="text-start py-1 px-3">
                                    <h6 class="mb-0"> <i data-feather="list" class="fea icon-ex-md me-3"></i>Jobs</h6>
                                </div>
                            </a><!--end nav link-->
                        </li><!--end nav item-->

                    </ul><!--end nav pills-->
                </div><!--end col-->

                <div class="col-md-8 col-12 ">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade bg-white show active shadow rounded p-4" id="dash" role="tabpanel" aria-labelledby="dashboard">
                            {!! $company->company_detail->about !!}
                        </div><!--end teb pane-->

                        <div class="tab-pane fade bg-white shadow rounded p-4" id="orders" role="tabpanel" aria-labelledby="order-history">
                            <div class="table-responsive bg-white shadow rounded">
                                <table class="table mb-0 table-center table-nowrap">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-bottom">Sr#</th>
                                        <th scope="col" class="border-bottom">Date</th>
                                        <th scope="col" class="border-bottom">Title</th>
                                        <th scope="col" class="border-bottom">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $jobs=findJobs($company->id);
                                    @endphp
                                    @foreach($jobs as $job)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{date('d M Y',strtotime($job->created_at))}}</td>
                                            <td class="text-success">{{$job->title}}</td>
                                            <td><a href="{{route('job.detail',$job->slug)}}" class="text-primary">View <i class="uil uil-arrow-right"></i></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div><!--end teb pane-->

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->





    @endsection
