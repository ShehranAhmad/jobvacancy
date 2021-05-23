@extends('layouts.front')
@section('title', 'Blog')
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Blog </h1>
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
            <div class="row justify-content-center">

                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card blog rounded border-0 shadow">
                            <div class="position-relative">
                                <img src="{{asset($blog->image)}}" style="height: 266px" class="card-img-top rounded-top" alt="...">
                                <div class="overlay rounded-top bg-dark"></div>
                            </div>
                            <div class="card-body py-2 content">
                                <h5><a href="javascript:void(0)" class="card-title title text-primary">{{$blog->title}}</a></h5>
                                <div class="post-meta d-flex justify-content-between mt-2">
                                    @php
                                        $desc=substr_replace($blog->description, "...", 50);
                                    @endphp
                                    <span>
                                    {!! $desc !!}
                                    <a href="{{route('blog.detail',$blog->slug)}}" class="text-primary readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>
                                </span>
                                </div>
                            </div>
                            <div class="author">
                                <small class="text-light user d-block"><i class="uil uil-user"></i> {{$blog->written_by}}</small>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach


            </div><!--end row-->
        </div><!--end container-->
    </section>




    @endsection
