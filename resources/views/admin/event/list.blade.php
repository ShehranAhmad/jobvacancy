@extends('layouts.admin')
@section('title', 'Events List')
@section('heading','Events List')
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
                                <th>Company</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th class="float-right">Action</th>

                                </thead>
                                <tbody>

                                @foreach($events as $event)

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-capitalize">{{$event->company->name}}</td>
                                        <td>{{$event->title }}</td>
                                        <td>{{$event->date}}</td>
                                        <td>{{$event->address}}</td>
                                        <td>
                                            <div class="btn-group float-right">
                                                <a href="{{route('admin.event.edit',['id'=>$event->id] )}}"
                                                   class="btn btn-relief-secondary action_btn">Edit</a>
                                                <button type="button"
                                                        onclick="deleteAlert('{{ route('admin.event.delete',['id'=>$event->id] ) }}')" class="btn btn-relief-danger  action_btn del-btn">Delete</button>

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
                let url = '{{route('admin.event.add')}}';
                window.location.href = url;

            });
        });
    </script>

@endsection
