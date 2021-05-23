@extends('layouts.front')
@section('title', 'Companies List')
@section('css')

@endsection
@section('content')

    <!-- Hero Start -->
    <section class="bg-half  d-table w-100" style="background: url('{{asset('front/images/account/bg.png')}}') center center;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="page-next-level">
                        <h4 class="title mt-4 mb-3">Companies List</h4>
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
                @foreach($companies as $company)

                    <div class="col-md-4 col-lg-3 mt-4 ">
                            <div class="card categories overflow-hidden rounded shadow-lg border-0">
                                <a href="{{route('company.detail',$company->slug)}}">
                                    <img src="{{asset($company->avatar)}}" style="height: 82px;" class="img-fluid w-100" alt="">
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between mb-0">
                                        <li><a href="{{route('company.detail',$company->slug)}}" class="title h6 text-primary">{{$company->name}}</a></li>
                                        <li class="h6 mb-0 jobs">{{count($company->jobs)}} Jobs</li>
                                    </ul>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
