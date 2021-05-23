<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - Job Vacancy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta')
    <meta name="author" content="" />
    <meta name="email" content="" />
    <meta name="website" content="" />
    <meta name="Version" content="v3.0.0" />
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">
    <!-- Bootstrap -->
    <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- tobii css -->
    <link href="{{asset('front/css/tobii.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons -->
    <link href="{{asset('front/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
    <!-- Slider -->
    <link rel="stylesheet" href="{{asset('front/css/tiny-slider.css')}}"/>
    <!-- Main Css -->
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">--}}
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css" id="theme-opt" />
    <link href="{{asset('front/css/colors/default.css')}}" rel="stylesheet" id="color-opt">
    @yield('css')

</head>

<body>


    <!-- Hero Start -->
    <section class="bg-home  bg-light d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-soft-primary rounded-circle mx-auto" style="height: 90px; width:90px;">
                            <i class="uil uil-thumbs-up align-middle h1 mb-0"></i>
                        </div>
                        <h1 class="my-4 fw-bold">Your Inquiry has been submitted.</h1>
                        <p class="text-muted para-desc mx-auto">Please Wait, admin will contact you soon.</p>

                            <a href="{{route('index')}}" class="btn btn-soft-primary mt-3" style="margin-left: 10px;">Home</a>

                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <!-- Hero End -->



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
    <!-- SLIDER -->
    <script src="{{asset('front/js/tiny-slider.js')}} "></script>
    <!-- tobii js -->
    <script src="{{asset('front/js/tobii.min.js')}} "></script>
    <!-- Icons -->
    <script src="{{asset('front/js/feather.min.js')}}"></script>
    <!-- Main Js -->
    {{--<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>--}}
    {{--<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>--}}

    <script src="{{asset('front/js/plugins.init.js')}}"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
    <script src="{{asset('front/js/app.js')}}"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->



</body>
</html>
