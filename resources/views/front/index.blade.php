@extends('layouts.front')
@section('title', 'Home')
@section('meta')
    <meta name="description" content="{{$setting['home_meta_description']??"" }}" />
    <meta name="keywords" content="{{$setting['home_meta_tag'] ??""}}" />
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
    <style>
        #append ul li{
            cursor: pointer;
        }
    </style>
    @endsection
@section('content')



    <!-- Hero Start -->
    <section class="bg-half-170 d-table w-100 " style="background: url('{{asset($setting['home_banner']??"")}}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="title-heading mt-4">
{{--                        <h6 class="text-light para-dark animated fadeInDownBig animation-delay-1">The Best Coworking in The City</h6>--}}
                        <h1 class="heading mb-3 text-white title-dark animated fadeInUpBig animation-delay-3">{{$setting['banner_heading']??""}}</h1>
                        <p class="para-desc mx-auto text-light para-dark animated fadeInUpBig animation-delay-7">{{$setting['banner_description']??""}}</p>

                        <div class="text-center subcribe-form mt-4 pt-2 animated fadeInUpBig animation-delay-11">
                            <form method="get" action="{{route('search')}}">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-5 p-0" >
                                            <input type="text" id="job_title" name="skill" class="" placeholder="Job Skill">
                                            <div id="append" style="position: absolute;width: 100%">

                                            </div>
                                        </div>
                                        <div class="col-md-5 p-0">
                                            <input type="text" id="address"  name="city" class="" placeholder="Location">
                                        </div>
                                        <div class="col-md-2 bg-div" style="padding: 2px 0px 0px 0px;">

                                                <button type="submit" class="btn btn-primary float-md-end" style="border-radius: unset;">Search</button>

                                        </div>
                                    </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->

    <section class="section bg-light">
        <div class="container ">
            <div class="row justify-content-center">
            <div class="col-12 text-center">
            <div class="section-title">
                <p class="text-muted para-desc mx-auto mb-0">DON'T KNOW WHERE TO START? </p>
                <h4 class="title mb-2"> Trending Searches</h4>

        </div>
        </div><!--end col-->
        </div><!--end row-->

        <div class="row justify-content-center">
            @foreach($trending_jobs as $trending)
                <div class="col-lg-3 col-md-4 mt-4 pt-2">
                    <div class="d-flex key-feature bg-soft-primary justify-content-center align-items-center p-3 rounded-pill shadow">
                        <div class="">
                            <h5 class="title  mb-0">{{$trending->name}}</h5>
                        </div>
                    </div>
                </div><!--end col-->
            @endforeach

            <div class="col-12 mt-4 pt-2 text-center">
                <a href="{{route('search')}}" class="btn btn-primary">See More <i class="uil uil-angle-right"></i></a>
            </div><!--end col-->
        </div><!--end row-->
        </div>
    </section>

    <section class="section ">
        <div class="container ">
            <div class="row align-items-center mb-4 pb-2">
                <div class="col-lg-10">
                    <div class="section-title text-center text-lg-start">
                        <h6 class="text-primary">Blog</h6>
                        <h4 class="title mb-4 mb-lg-0">Reads Our Latest  &amp; Blog</h4>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 mt-4 col-3">
                    <div class="section-title text-center justify-content-center text-lg-start">
                        <a href="{{route('blog')}}" class="btn btn-primary float-end">See More <i class="uil uil-angle-right"></i></a>
                    </div>
                </div>

            </div><!--end row-->

            <div class="row justify-content-center">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="card blog rounded border-0 shadow">
                        <div class="position-relative">
                            <img src="{{asset($blog->image)}}" style="height: 266px" class="card-img-top rounded-top" alt="...">
                            <div class="overlay rounded-top bg-dark"></div>
                        </div>
                        <div class="card-body py-2 content">
                            <h5><a href="javascript:void(0)" class="card-title title text-dark">{{$blog->title}}</a></h5>
                            <div class="post-meta d-flex justify-content-between mt-2">
                                @php
                                    $desc=substr_replace($blog->description, "...", 70);
                                @endphp
                                <span class="font-weight-bold text-success">
                                   Written by : {{$blog->written_by}}
                                </span>
                                <a href="{{route('blog.detail',$blog->slug)}}" class="text-muted readmore">Read More <i class="uil uil-angle-right-b align-middle"></i></a>

                            </div>
                        </div>
                        <div class="author">
                            <small class="text-light user d-block"><i class="uil uil-user"></i> {{$blog->written_by}}</small>
                        </div>
                    </div>
                </div><!--end col-->
                @endforeach

            </div><!--end row-->
        </div>
    </section>

    <section class="section bg-light">
        <div class="container ">
            <div class="row align-items-center mb-4 pb-2">
                <div class="col-lg-10 col-9">
                    <div class="section-title text-center text-lg-start">
                        <h6 class="text-primary">Event</h6>
                        <h4 class="title mb-4 mb-lg-0">Watch Our Latest  &amp; Events</h4>
                    </div>
                </div><!--end col-->
                <div class="col-lg-2 mt-4 col-3">
                    <div class="section-title text-center justify-content-center text-lg-start">
                        <a href="{{route('event')}}" class="btn btn-primary float-end">See More <i class="uil uil-angle-right"></i></a>
                    </div>
                </div>
            </div><!--end row-->

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
            </div>
        </div>
    </section>

    <section class="section" style="background: url('{{asset($setting['home_contact_banner']??"")}}') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7">
                    <div class="section-title me-lg-4">
                        <h4 class="title title-dark text-light mb-4">We are Built for Business – Explore Us Today !</h4>
                        <p class="text-light para-dark para-desc mb-0">Start working with <span class="text-success fw-bold">Landrick</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>

                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-5 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="card rounded shadow border-0">
                        <div class="card-body">
                            <h5 class="text-center">Get in Touch with Us</h5>

                            <form method="post" action="{{route('submit.inquiry')}}">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user fea icon-sm icons"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input name="name" id="name3" type="text" class="form-control ps-5" placeholder="Name" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail fea icon-sm icons"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                                <input type="email" id="email3" class="form-control ps-5" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <div class="form-icon position-relative">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm icons"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                                <input name="number" id="number" type="tel" class="form-control ps-5" placeholder="Phone no. :" required="">
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md-12">
                                        <div class="mb-1">
                                            <div class="form-icon position-relative">
                                                <textarea name="message" required class="form-control" cols="4" rows="3" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                    </div><!--end col-->

                                    <div class="col-lg-12 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section>


    <section class="py-4 bg-light">
        <div class="container">
            <div class="col-12 text-center">
                <div class="section-title">
                    <h4 class="title mb-2"> Top Hiring Companies</h4>
                </div>
            </div><!--end col-->
            <div class="row justify-content-center py-2">
                <div class="slider" >
                    @foreach($comp_logos as $comp_logo)
                        <div><img src="{{asset($comp_logo->image)}}" class="avatar text-center avatar-ex-sm" alt=""></div>
                    @endforeach

                </div>


            </div><!--end row-->
        </div><!--end container-->
    </section>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                infinite: true,
                autoplay: true,
                speed: 1000,
                slidesToShow: 7,
                slidesToScroll: 2,
                responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 7,
                        slidesToScroll: 2,
                        infinite: true,
                        dots: true
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 2
                    }
                },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                    ]
            });
        });
    </script>
    <script>
        function initMap() {
            var input = document.getElementById('address');
            var options = {
                types: ['(cities)'],
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                let city=place.vicinity;
                $('#address').val(city);


            })
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    <script>
        $(document).ready(function () {
            $('#job_title').on('keyup',function () {
                $('#append').show();
                let skill=$(this).val();
                let url='{{route('find.skill')}}?skill='+skill;
                $.get(url,function (data) {
                    $('#append').fadeIn();
                    console.log(data.html);
                    $('#append').html(data.html);
                });
            });
        });
    </script>


    @endsection
