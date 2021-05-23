@extends('layouts.front')
@section('title', 'Blog Detail')
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Blog's Detail </h1>
                        <p class="text-white-50 para-desc mb-0 mx-auto"></p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>



    <section class="section">
        <div class="container">
            <div class="row">
                <!-- BLog Start -->
                <div class="col-lg-8 col-md-6">
                    <div class="card blog blog-detail border-0 shadow rounded">
                        <img src="{{asset($blog->image)}}"  class="img-fluid rounded-top" alt="">
                        <div class="card-body content">
                            <h6><i class="mdi mdi-tag text-primary me-1"></i><a href="javscript:void(0)" class="text-primary text-capitalize">{{$blog->tags}}</a></h6>
                            <p class="mb-0">
                                {!! $blog->description !!}
                            </p>
                        </div>
                    </div>


                </div>
                <!-- BLog End -->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card border-0 sidebar sticky-bar rounded shadow">
                        <div class="card-body">


                            <!-- Categories -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="list-unstyled mt-4 mb-0 blog-categories">
                                    @foreach($categories as $category)
                                        @php
                                            $count=\App\Models\Jobs::where('category',$category)->count();
                                        @endphp
                                    <li><a href="{{route('search')}}?category={{$category}}">{{$category}}</a> <span class="float-end">{{$count}}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- Categories -->

                            <!-- RECENT POST -->
                            <div class="widget mb-4 pb-2">
                                <h5 class="widget-title">Recent Jobs</h5>
                                <div class="mt-4">
                                    @foreach($jobs as $job)
                                        <div class="clearfix post-recent">
                                            <div class="post-recent-thumb float-start"> <a href="jvascript:void(0)"> <img style="height: 58px;" alt="img" src="{{asset($job->company->avatar)}}" class="img-fluid rounded"></a></div>
                                            <div class="post-recent-content float-start"><a href="{{route('job.detail',$job->slug)}}" class="text-capitalize">{{$job->title}}</a><span>{{$job->job_type}}</span></div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!-- RECENT POST -->




                        </div>
                    </div>
                </div><!--end col-->
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section>





@endsection
