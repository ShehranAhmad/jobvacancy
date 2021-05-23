@extends('layouts.front')
@section('title', 'Jobs List')
@section('meta')
    <meta name="description" content="{{$setting['job_meta_description']??"" }}" />
    <meta name="keywords" content="{{$setting['job_meta_tag'] ??""}}" />
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">

    <style>
        .select2-container .select2-selection--single{
            height: 40px!important;
        }
        hr{
            margin: 3px 0px 3px 0px!important;
            height: 1px !important;
        }

        .form-check
        {
            padding: 4px 0px 4px 0px!important;
        }

         #append_company ul li{
             cursor: pointer;
         }
        .form-check{
            padding-left: 0px!important;
        }
        .pagination{
            justify-content: center;
        }
    </style>


    @endsection
@section('content')


    <!-- Hero Start -->
    <section class="bg-half d-table w-100" style="background: url('{{asset('front/images/company/aboutus.jpg')}}');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center banner-text-height" >
                    <div class="page-next-level title-heading">
                        <h1 class="text-white title-dark"> Jobs </h1>
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
    <section class=" mt-4 mb-4">
        <div class="container">
            <div class="row">

                <div class="col-md-4 mt-4 pt-2">
                    <div class="sidebar sticky-bar  ">
                        <h4 style="border-bottom: 1.5px solid">Filters</h4>
                        <div class="card shadow">
                            <div class="card-body">
                                <form id="search-form" method="get" action="{{route('search')}}">

                                    <div class="col-md-12 mb-2 pb-2" style="position: relative!important;">
                                        <div class="form-group">
                                            <select name="company_id" style="height: 40px"  data-live-search="true" class="form-control  select2  li-click">
                                                <option disabled selected>Select Company</option>
                                                @foreach($companies as $company)
                                                    <option {{$request->company_id==$company->id?'selected':''}} value="{{$company->id}}" >{{$company->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2 pb-2">
                                        <input type="text" name="city" id="address" value="{{$request->city}}" class="form-control  form-focus " placeholder="Location">
                                    </div>
                                    <div class="col-md-12 mb-3" >
                                        <div class="form-group" style="position: relative">
                                            <select name="skill" class="form-control select2 li-click" data-live-search="true"  >
                                                <option disabled selected>Job Skill</option>
                                                @foreach($categories as $category)
                                                    <option {{$request->skill==$category->name?'selected':''}} value="{{$category->name}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-check border-bottom  ">
                                        <label class="form-check-label " for="junior">Junior</label>
                                        <input class="form-check-input float-end"
                                             @if($request->level)
                                               @foreach($request->level as $emp_type)
                                               {{$emp_type=='Junior'?'checked':''}}
                                               @endforeach
                                             @endif
                                               name="level[]" value="Junior" type="checkbox" id="junior" >
                                    </div>

                                    <div class="form-check border-bottom   ">
                                        <label class="form-check-label " for="mid">Mid Level</label>
                                        <input class="form-check-input float-end"
                                               @if($request->level)
                                               @foreach($request->level as $emp_type)
                                               {{$emp_type=='Mid Level'?'checked':''}}
                                               @endforeach
                                               @endif
                                               name="level[]" value="Mid Level" type="checkbox" id="mid" >
                                    </div>

                                    <div class="form-check     ">
                                        <label class="form-check-label " for="senior">Senior</label>
                                        <input class="form-check-input float-end"
                                               @if($request->level)
                                               @foreach($request->level as $emp_type)
                                               {{$emp_type=='Senior'?'checked':''}}
                                               @endforeach
                                               @endif
                                               name="level[]" value="Senior" type="checkbox" id="senior" >
                                    </div>

                                    <h6 class="mt-3" style="border-bottom: 1.5px solid;">Job Type</h6>
                                    <div class="form-check    border-bottom ">
                                        <label class="form-check-label " for="full_time">Full Time</label>
                                        <input class="form-check-input float-end"
                                               @if($request->employee_type)
                                               @foreach($request->employee_type as $emp_type)
                                               {{$emp_type=='Full Time'?'checked':''}}
                                               @endforeach
                                               @endif
                                               name="employee_type[]" value="Full Time" type="checkbox" id="full_time" >
                                    </div>
                                    <div class="form-check     border-bottom ">
                                        <label class="form-check-label " for="part_time">Part Time</label>
                                        <input class="form-check-input float-end"
                                               @if($request->employee_type)
                                               @foreach($request->employee_type as $emp_type)
                                               {{$emp_type=='Part Time'?'checked':''}}
                                               @endforeach
                                               @endif
                                               name="employee_type[]" value="Part Time" type="checkbox" id="part_time" >
                                    </div>
                                    <div class="form-check  border-bottom ">
                                        <label class="form-check-label " for="internship">Internship</label>
                                        <input class="form-check-input float-end"
                                               @if($request->employee_type)
                                               @foreach($request->employee_type as $emp_type)
                                               {{$emp_type=='Internship'?'checked':''}}
                                               @endforeach
                                               @endif
                                               name="employee_type[]" value="Internship" type="checkbox" id="internship" >
                                    </div>
                                    <div class="form-check   ">
                                        <label class="form-check-label " for="freelance">Freelance</label>
                                        <input class="form-check-input float-end" name="employee_type[]"
                                               @if($request->employee_type)
                                               @foreach($request->employee_type as $emp_type)
                                                   {{$emp_type=='Freelancer'?'checked':''}}
                                               @endforeach
                                               @endif
                                               value="Freelancer" type="checkbox" id="freelance" >
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-md-8 col-12 mt-4 pt-2">
                    <h4 style="border-bottom: 1.5px solid">Jobs List</h4>
                    <div class="row">
                        @foreach($jobs as $job)
                            @php
                                $company=$job->company;
                            @endphp
                        <div class="col-md-12 mb-3">
                            <div class="card shadow pricing-rates">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 mt-2 col-sm-5 col-5">
                                            <img class="w-100" style="height: 125px" src="{{asset($company->avatar??'front/images/3.jpg')}}">
                                            @if(Auth::user() && Auth::user()->role=='employee')
                                                <div class="text-center mt-2">
                                                    @php
                                                        $followed=Auth::user()->user_followup->where('company_id',$company->id);
                                                        $favorite=Auth::user()->user_favorite->where('job_id',$job->id);
                                                    @endphp
                                                    <a href="#"  class="text-primary btn-follow follow-{{$company->id}}" @if(count($followed)>0) style="display: none;"  @endif  title="Follow Company" data-company="{{$company->id}}"> + Follow</a>
                                                    <a href="#"  class="text-danger btn-unfollow unfollow-{{$company->id}}" @if(count($followed)==0)  style="display: none;" @endif  title="Un follow Company" data-company="{{$company->id}}"> -  Unfollow</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-md-9 col-sm-7 col-7">
                                            <a class="float-start" href="{{route('company.detail',$company->slug)}}">
                                                <h5 class="text-capitalize">{{$company->name}}</h5>
                                            </a>
                                            @if($job->is_featured==true)
                                                <a href="javascript:void(0)" class="float-end badge badge-link  bg-success" >Premium</a>
                                            @endif
                                            <div class="">
                                                <table class="table mb-0 table-center table-nowrap">

                                                    <tbody>
                                                    <tr>
                                                        <th scope="row" colspan="2">
                                                            <a href="{{route('job.detail',$job->slug)}}" class="text-capitalize mb-0 pt-2 float-start h5">
                                                                {{$job->title}}
                                                            </a>
                                                            @if(Auth::user() && Auth::user()->role=='employee')
                                                                <a href="javascript:void(0)" class="float-end btn btn-icon @if(count($favorite)==0) btn-outline-danger btn-favorite @else btn-danger @endif favorite-{{$job->id}}" data-company="{{$company->id}}" data-job="{{$job->id}}" title="@if(count($favorite)==0) Add to whish list @else Already added to whish list  @endif"><i data-feather="heart" class="icons"></i></a>
                                                            @endif
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row"><span class="font-weight-bold">Job Type</span> &nbsp;&nbsp;&nbsp; {{$job->employee_type}}</td>
                                                        <td scope="row"><span class="font-weight-bold">Location</span> &nbsp;&nbsp;&nbsp; {{$job->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td scope="row" colspan="2"><span class="font-weight-bold">Category</span> &nbsp;&nbsp;&nbsp;
                                                            @php
                                                                $categories=explode(',',$job->category)
                                                            @endphp
                                                            @foreach($categories as $cate)
                                                                <span class="badge bg-soft-primary">{{$cate}}</span>
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach


                    </div>
                    <div class="row mt-3 justify-content-center">
                        {{$jobs->links()}}
                    </div>




                </div><!--end col-->
            </div><!--end row-->
        </div>
    </section>




@endsection
@section('js')
    <script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places" type="text/javascript"></script>
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
               // $('#address').val(city);
                $('#search-form').submit();

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
    <script>
        $(document).ready(function () {
            $('#company').on('keyup',function(){
                let name=$(this).val();
                let url='{{route('find.company')}}?name='+name;
                $.get(url,function(data){
                    $('#append_company').show();
                    $('#append_company').html(data.html);


                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.form-check-input').on('change',function () {
                $('#search-form').submit();
            });
            $('.li-click').on('change',function () {

                $('#search-form').submit();
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.btn-follow').click(function (e) {
                e.preventDefault();
                let company_id=$(this).data('company');
                let url='/employee/follow-company?company='+company_id;
                $.get(url,function (data) {
                    $('.follow-'+company_id).hide();
                    $('.unfollow-'+company_id).show();
                });
            });
            $('.btn-unfollow').click(function (e) {
                e.preventDefault();
                let company_id=$(this).data('company');
                let url='/employee/unfollow-company?company='+company_id;
                $.get(url,function (data) {
                    $('.unfollow-'+company_id).hide();
                    $('.follow-'+company_id).show();

                });
            });
            $('.btn-favorite').click(function (e) {
                e.preventDefault();
                let company_id=$(this).data('company');
                let job_id=$(this).data('job');
                let url='/employee/favorite-job?company='+company_id+'&job='+job_id;
                $.get(url,function (data) {
                    $('.favorite-'+job_id).addClass('disabled btn-danger');
                    $('.favorite-'+job_id).removeClass('btn-outline-danger');
                    $('.favorite-'+job_id).attr('title','Job added to favorite list');
                });
            });


        })
    </script>
    @endsection
