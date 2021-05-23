@extends('layouts.admin')
@section('title','Inquiries')
@section('heading','Inquiries List')
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Number</th>
                                    <th>Subject</th>
                                    <th class="float-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inquiries as $job)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$job->name}}</td>
                                        <td>{{$job->email}}</td>
                                        <td>{{$job->number}}</td>
                                        <td>{{$job->subject}}</td>
                                        <td class="float-right">
                                            <div class="btn-group">
                                                <a href="{{route('admin.inquiries.detail',$job->id)}}" class="btn btn-relief-success">Detail</a>
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
            $('.dt-buttons.btn-group').css("display", "none");

        });
    </script>


@endsection
