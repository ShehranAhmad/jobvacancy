@extends('layouts.admin')
@section('title','Add Company')
@section('heading','Add New Company')

@section('content')


    <section class="page-users-view mb-3">
        <form action="{{ route('admin.store.setting.hiring.company') }}" enctype="multipart/form-data" method="POST">
            @csrf
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
                                            <input type="file" name="image" class="dropify" data-default-file="{{asset('uploads/users/default.png')}}"  required/>
                                            @csrf
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 ">
                        <button type="submit" class="btn btn-primary float-right" title="Add Tutor">Submit</button>
                    </div>
                </div>
                <!-- account end -->



            </div>
        </form>
    </section>


@endsection
@section('js')





@endsection
