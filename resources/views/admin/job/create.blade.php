@extends('layouts.admin')
@section('title','Add Job')
@section('heading','Add New Job')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <style>
        .note-editing-area{
            min-height: 120px!important;
        }
    </style>
@endsection
@section('content')


    <section class="page-users-view mb-3">
        <form action="{{ route('admin.job.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="row">
                <!-- account start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Job Detail</h4>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="col-sm-12 mb-3 data-field-col">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Company Name</label>
                                            <select name="company_id" data-live-search="true" required class="form-control selectpicker select2">
                                                <option disabled selected value="">Select Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Address</label>
                                            <input type="text" id="address" value="{{old('address')}}" class="form-control" name="address" required>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Apply Link</label>
                                            <input type="text" value="{{old('link')}}" class="form-control" placeholder="https://www.xyz.com/apply" name="link" required>
                                        </div>

                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Job Title</label>
                                            <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Job Title" required>
                                        </div>
                                        <div class="col-sm-12 mb-1 col-md-8 data-field-col">
                                            <label for="data-name" class="">Job Category</label>
                                            <select class="form-control category selectpicker select2" multiple="multiple" data-live-search="true" name="category_name[]" required>
                                                <option disabled >Select Job Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->name}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--<div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Job Type</label>
                                            <select class="form-control type selectpicker select2" data-live-search="true" name="job_type" required>
                                                <option disabled selected value="">Select Job Type</option>
                                                @foreach($skills as $skill)
                                                    <option value="{{$skill->name}}">{{$skill->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>--}}
                                        <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Job Level</label>
                                            <select class="form-control  selectpicker select2" data-live-search="true" name="job_level" required>
                                                <option disabled selected value="">Job Level</option>
                                                <option  value="Junior">Junior</option>
                                                <option  value="Mid Level">Mid Level</option>
                                                <option  value="Senior">Senior</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Employee Type</label>
                                            <select class="form-control  selectpicker select2" data-live-search="true" name="employee_type" required>
                                                <option disabled selected value="">Employee Type</option>
                                                <option  value="Full Time">Full Time</option>
                                                <option  value="Part Time">Part Time</option>
                                                <option  value="Internship">Internship</option>
                                                <option  value="Freelancer">Freelancer</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Experience</label>
                                            <input type="text" value="{{old('experience')}}" class="form-control" placeholder="Job Experience" name="experience">
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Salary</label>
                                            <input type="text" value="{{old('salary')}}" class="form-control" placeholder="$5000 - $7000" name="salary">
                                        </div>

                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col" style="margin-top: 29px;">
                                            <span style="font-size: 15px">
                                                is_featured
                                                    <input type="checkbox" value="1" class="ml-2"  name="is_featured">
                                            </span>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4>Job Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <label>Job Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Job Description">{!! old('description') !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 ">
                        <button type="submit" class="btn btn-primary float-right" title="Add Job">Submit</button>
                    </div>
                </div>
                <!-- account end -->



            </div>
        </form>
    </section>


@endsection
@section('js')

    {{--    <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>--}}
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script>
        function initMap() {
            var input = document.getElementById('address');
            var options = {
                types: ['(cities)'],
            };
            var autocomplete = new google.maps.places.Autocomplete(input, options);
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

    <script>
        $(document).ready(function () {
            $(document).ready(function () {
                $('#description').summernote();
            });
           /* $('.category').on('change',function () {
                let id=$(this).val();
                let url='{{route('admin.find.skill')}}?category_id='+id;
                $.get(url,function (data) {

                    $('.type').html(data.html);
                });

            });*/

        });
    </script>


@endsection
