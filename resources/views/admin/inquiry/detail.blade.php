@extends('layouts.admin')
@section('title','Inquiry Detail')
@section('heading','Inquiry Detail')
@section('css')

    <style>
        .page-users-view table td {
            padding-bottom: 0.8rem;
            min-width: 140px;
            word-break: break-word;
        }
        i{
            font-size: 17px!important;
        }
    </style>

@endsection
@section('content')

    <section class="page-users-view">
        <div class="row">
            <!-- account start -->

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Inquiry Detail</div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Name</td>
                                        <td class="text-capitalize">{{$inquiry->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td>{{$inquiry->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Phone</td>
                                        <td>{{$inquiry->number}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody><tr>
                                        <td class="font-weight-bold">Status</td>
                                        <td>{{$inquiry->status}}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Inquiry Date</td>
                                        <td>{{date('d-m-Y',strtotime($inquiry->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Subject</td>
                                        <td>{{$inquiry->subject}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-12 col-12">
                                <p><span class="font-weight-bold">Message : </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$inquiry->message}}</p>
                            </div>
                            <div class="col-12">
                                <div class="btn-group mt-2">
                                    @if($inquiry->status=='active')
                                        <button type="button" onclick="closeInquiry('{{route('admin.inquiries.close',$inquiry->id)}}')" class="btn btn-relief-success block-company waves-effect waves-light">Close</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @endsection
