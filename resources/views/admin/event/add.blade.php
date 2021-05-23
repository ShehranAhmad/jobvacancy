@extends('layouts.admin')
@section('title', 'Add Event')
@section('heading','Add Event')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')


    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add event</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.event.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                               value="{{old('meta_title')}}">
                                        @if($errors->has('meta_title'))
                                            {{ $errors->first('meta_title') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta keywords</label>
                                        <input type="text" class="form-control" name="meta_keywords"
                                               value="{{old('meta_keywords')}}">
                                        @if($errors->has('meta_keywords'))
                                            {{ $errors->first('meta_keywords') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tags</label><br /> <small>please include comma separated tags example:
                                            books,cooking</small>
                                        <input type="text" class="form-control" name="tags"
                                               value="{{old('tags')}}">
                                        @if($errors->has('tags'))
                                            {{ $errors->first('tags') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Meta Description*</label>
                                        <input  type="text" class="form-control" name="meta_description"
                                                  value="{{old('meta_description')}}">
                                        @if($errors->has('meta_description'))
                                            {{ $errors->first('meta_description') }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label>Company<span class="text-danger">*</span></label>
                                        <select class="form-control selectpicker select2" data-live-search="true" name="company_id" required>
                                            <option disabled selected value="">Select Company</option>
                                            @foreach($companies as $company)
                                                <option value="{{$company->id}}">{{$company->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Title<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" required name="title" value="{{old('title')}}">
                                        @if($errors->has('title'))
                                            {{ $errors->first('title') }}
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Organized By</label>
                                        <input type="text" class="form-control" required name="organized_by"
                                               value="{{old('written_by')}}">
                                        @if($errors->has('written_by'))
                                            {{ $errors->first('written_by') }}
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control dropify" required name="image"
                                               value="{{old('image')}}">
                                        @if($errors->has('image'))
                                            {{ $errors->first('image') }}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Event Date<span class="text-danger"></span></label>
                                        <input type="text" required class="form-control datepicker" id="date" name="date"
                                               value="{{old('date')}}">
                                        @if($errors->has('date'))
                                            {{ $errors->first('date') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Event Address<span class="text-danger"></span></label>
                                        <input type="text" required class="form-control " id="address" name="address"
                                               value="{{old('address')}}">
                                        @if($errors->has('address'))
                                            {{ $errors->first('address') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Register Link<span class="text-danger"></span></label>
                                        <input type="text" required class="form-control " id="link" name="link"
                                               value="{{old('link')}}">
                                        @if($errors->has('link'))
                                            {{ $errors->first('link') }}
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-1   col-md-4  data-field-col" >
                                            <span style="font-size: 15px">
                                                is_physical
                                                    <input type="checkbox" value="1" checked class="ml-2"  name="is_physical">
                                            </span>
                                </div>
                                <div class="col-sm-12 mb-1   col-md-4  data-field-col" >
                                            <span style="font-size: 15px">
                                                is_free
                                                    <input type="checkbox" value="1" checked class="ml-2"  name="is_free">
                                            </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description*</label>
                                        <textarea type="text" class="form-control" id="description" name="description"
                                                  value="{{old('description')}}"></textarea>

                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary pull-left">Save</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
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
