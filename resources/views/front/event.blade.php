@extends('layouts.front')
@section('title', 'Events')
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Events </h1>
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

                @foreach($events as $event)
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="card work-container work-modern rounded border-0 overflow-hidden">
                            <div class="card-body p-0">
                                <a href="{{route('event.detail',$event->slug)}}">
                                    <img src="{{asset($event->image)}}" class="img-fluid w-100 rounded" style="height: 316px;" alt="work-image">
                                    <div class="overlay-work"></div>
                                    <div class="content">
                                        @if($event->is_free==true)
                                            <a href="javascript:void(0)" class="title text-white pb-2 border-bottom">Free</a>
                                        @endif
                                        <p class="text-white mt-2 d-block mb-0"><i class="uil uil-calendar-alt"></i> <span class="text-success">{{$event->date}}</span></p>
                                    </div>
                                    <div class="read_more bg-primary text-center rounded-circle">
                                        <a href="{{route('event.detail',$event->slug)}}" class="text-light d-block"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right fea icon-sm title-dark"><polyline points="9 18 15 12 9 6"></polyline></svg></a>
                                    </div>
                                </a>
                            </div>
                            <div class="author">
                                <a href="{{route('company.detail',$event->slug)}}">
                                    <small class="text-light font-weight-bold user d-block" style="top: 5%;
    left: 5%;position: absolute;"><i class="uil uil-user"></i> {{$event->company->name}}</small>
                                </a>
                            </div>
                        </div>

                    </div><!--end col-->
                @endforeach


            </div><!--end row-->
        </div><!--end container-->
    </section>




@endsection
