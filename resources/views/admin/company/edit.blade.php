@extends('layouts.admin')
@section('title','Edit Company')
@section('heading','Edit Company')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

@endsection
@section('content')


    <section class="page-users-view mb-3">
        <form action="{{ route('admin.company.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$company->id}}">
            <div class="row">
                <!-- account start -->
                <div class="col-12">
                    <div class="card">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Logo<span class="text-danger">*</span>   </label>
                                        <div>
                                            <input type="file" name="image" class="dropify" data-default-file="{{asset($company->avatar??'uploads/users/default.png')}}"  />
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                            <label for="data-name" class="">Company Name</label>
                                            <input type="text" value="{{$company->name}}" class="form-control" name="name" required>
                                        </div>

                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Company Login Email</label>
                                            <input type="email" value="{{$company->email}}" class="form-control" name="email" required>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Company No</label>
                                            <input type="tel" value="{{$company->phone}}" class="form-control" name="phone" >
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-8  data-field-col">
                                            <label for="data-email">Address</label>
                                            <input type="text" id="address" value="{{$company->company_detail->address}}" class="form-control" name="address" required>
                                        </div>
                                        <div class="col-sm-12 mb-1   col-md-4  data-field-col">
                                            <label for="data-email">Postal code</label>
                                            <input type="text" value="{{$company->company_detail->postal_code}}" class="form-control" name="postal_code" >
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h4>Company Description</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <label>About Company</label>
                                <textarea name="about" id="description" class="form-control" placeholder="About Company">{!! $company->company_detail->about !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 ">
                        <button type="submit" class="btn btn-primary float-right" title="Add Tutor">Update</button>
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

        });
    </script>


@endsection
