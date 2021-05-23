@extends('layouts.admin')
@section('title','Top Hiring Companies')
@section('heading','Top Hiring Companies')
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
                                    <th>Company</th>

                                    <th class="float-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-capitalize"><img src="{{asset($user->image)}}" style="height: 60px;"></td>

                                        <td class="float-right">
                                            <div class="btn-group">
{{--                                                <a href="{{route('admin.company.edit',$user->slug)}}" class="btn btn-relief-primary">Edit</a>--}}
                                                <a href="#" onclick="deleteAlert('{{route('admin.delete.setting.hiring.company',$user->id)}}')" class="btn btn-relief-danger">Delete</a>
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
                let url = '{{route('admin.add.setting.hiring.company')}}';
                window.location.href = url;

            });
        });
    </script>


@endsection
