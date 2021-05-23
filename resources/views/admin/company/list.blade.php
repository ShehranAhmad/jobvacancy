@extends('layouts.admin')
@section('title','Companies')
@section('heading','Companies List')
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
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th class="float-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-capitalize">{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td class="float-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.company.edit',$user->slug)}}" class="btn btn-relief-primary">Edit</a>
                                                <a href="{{route('admin.company.detail',$user->slug)}}" class="btn btn-relief-success">Detail</a>
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
                let url = '{{route('admin.add.company')}}';
                window.location.href = url;

            });
        });
    </script>


@endsection
