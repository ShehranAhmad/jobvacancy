@extends('layouts.admin')
@section('title', 'Blogs List')
@section('heading','Blogs List')
@section('content')




        <div class="col-12">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>

        <div class="row">

            <div class=" col-md-12">
                <div class="card">

                    <div class="card-body ">
                        <section id="data-list-view" class="data-list-view-header">
                            <div class="table-responsive">
                                <table class="table data-list-view">
                                    <thead class="">
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Written by</th>
                                    <th class="float-right">Action</th>

                                    </thead>
                                    <tbody>

                                    @foreach($blogs as $blog)

                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$blog->title ?? ''}}</td>
                                            <td>{{$blog->written_by ?? ''}}</td>
                                            <td>
                                                <div class="btn-group float-right">
                                                    <a href="{{route('admin.blogs.edit',['id'=>$blog->id] )}}"
                                                       class="btn btn-relief-secondary action_btn">Edit</a>
                                                    <button type="button"
                                                            onclick="deleteAlert('{{ route('admin.blogs.delete',['id'=>$blog->id] ) }}')" class="btn btn-relief-danger  action_btn del-btn">Delete</button>
                                                    @if($blog->visibility == "hidden")
                                                        <a href="{{route('admin.blogs.change.visibility', [$blog->id, 'showed'] )}}"
                                                           class="btn btn-relief-info action_btn ">Show</a>
                                                    @else
                                                        <a href="{{route('admin.blogs.change.visibility', [$blog->id, 'hidden'] )}}"
                                                           class="btn btn-relief-info action_btn ">Hide</a>
                                                    @endif
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
                let url = '{{route('admin.blogs.add')}}';
                window.location.href = url;

            });
        });
    </script>

    @endsection
