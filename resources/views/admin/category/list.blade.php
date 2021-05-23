@extends('layouts.admin')
@section('title','Categories')
@section('heading','Categories List')
@section('content')


    <div class="row">

        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">


                    <!-- BEGIN: Content-->
                    <section id="data-list-view" class="data-list-view-header">


                        <!-- DataTable starts -->
                        <div class="table-responsive">
                            <table class="table data-list-view">

                                <thead>
                                <tr>
                                    <th>Sr</th>
                                    <th>Category</th>
                                    <th>Created Date</th>
                                    <th class="float-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-capitalize">{{$category->name}}</td>
                                        <td>{{date('d/m/Y',strtotime($category->created_at))}}</td>
                                        <td class="float-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.category.edit',$category->id)}}" class="btn btn-relief-primary">Edit</a>
                                                <a href="#" onclick="deleteAlert('{{route('admin.category.delete',$category->id)}}')" class="btn btn-relief-danger">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>


                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



@endsection
@section('js')

    <script>
        $(document).ready(function () {
            $('.dt-buttons.btn-group').click(function () {
                $('.add-new-data').css("display", "none");
                let url = '{{route('admin.category.add')}}';
                window.location.href = url;

            });
        });
    </script>


@endsection
