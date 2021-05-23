@extends('layouts.admin')
@section('title','jobs')
@section('heading','Jobs List')
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
                                    <th>Title</th>
                                    <th>Job Level</th>
                                    <th>Employee Type</th>
                                    <th>Featured</th>
                                    <th class="float-right">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$job->company->name}}</td>
                                            <td>{{$job->title}}</td>
                                            <td>{{$job->job_level}}</td>
                                            <td>{{$job->employee_type}}</td>
                                            <td>@if($job->is_featured==true)<span class="badge badge-primary">Featured</span>@endif </td>
                                            <td class="float-right">
                                                <div class="btn-group">
                                                    <a href="{{route('admin.job.edit',$job->slug)}}" class="btn btn-relief-primary">Edit</a>
                                                    <a href="{{route('admin.job.detail',$job->slug)}}" class="btn btn-relief-success">Detail</a>
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
                let url = '{{route('admin.job.add')}}';
                window.location.href = url;

            });
        });
    </script>


@endsection
