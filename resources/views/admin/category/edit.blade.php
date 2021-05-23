@extends('layouts.admin')
@section('title','Edit Category')
@section('heading','Edit Category')
@section('css')

@endsection
@section('content')


    <section class="page-users-view mb-3">
        <form action="{{ route('admin.category.update') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
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
                            <div class="row justify-content-center">
                                <div class="col-sm-12 mb-1 col-md-4 data-field-col">
                                    <label for="data-name" class="">Category Name</label>
                                    <input type="text" placeholder="Job Category" value="{{$category->name}}" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <button type="submit" class="btn btn-primary float-right" title="Update">Update</button>
                                </div>


                            </div>
                        </div>
                    </div>




                </div>
                <!-- account end -->



            </div>
        </form>
    </section>


@endsection
@section('js')




@endsection
