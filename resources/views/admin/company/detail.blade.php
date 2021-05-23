@extends('layouts.admin')
@section('title','Companies')
@section('heading','Companies Detail')
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
                        <div class="card-title">Company Detail</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="users-view-image" style="width: 180px;height: 150px;">
                                <img src="{{asset($company->avatar)}}" class="users-avatar-shadow h-100 w-100 rounded mb-2 pr-2 ml-1" alt="company">
                            </div>
                            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="font-weight-bold">Name</td>
                                        <td class="text-capitalize">{{$company->name}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Email</td>
                                        <td>{{$company->email}}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold">Phone</td>
                                        <td>{{$company->phone}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-12 col-lg-5">
                                <table class="ml-0 ml-sm-0 ml-lg-0">
                                    <tbody><tr>
                                        <td class="font-weight-bold">Status</td>
                                        <td>{{$company->status}}</td>
                                    </tr>

                                    <tr>
                                        <td class="font-weight-bold">Member Since</td>
                                        <td>{{date('d-m-Y',strtotime($company->created_at))}}</td>
                                    </tr>
                                    </tbody></table>
                            </div>
                            <div class="col-12">
                                <div class="btn-group mt-2">
                                    <a href="{{route('admin.company.edit',$company->slug)}}" class="btn btn-relief-secondary" title="Edit Tutor"><i class="fa fa-edit mr-1"></i>Edit</a>
                                    @if($company->status=='active')
                                        <button type="button" onclick="blockAlert('{{route('admin.company.block',$company->id)}}')" class="btn btn-relief-info block-company waves-effect waves-light"><i class="fa fa-ban"></i> Block</button>
                                    @elseif($company->status=='inactive' || $user->status=='pending')
                                        <button type="button" onclick="unblockAlert('{{route('admin.company.unblock',$company->id)}}')" class="btn btn-relief-success   waves-effect waves-light"><i class="fa fa-check-circle " style="margin-right: 5px;"></i>Active</button>
                                    @endif

                                    <button  type="button" onclick="deleteAlert('{{route('admin.company.delete',$company->id)}}')" title="Trash" class="btn btn-relief-danger waves-effect waves-light"><i class="feather icon-trash-2"></i> Delete</button>
                                </div>
                            </div>
                            @if($company->company_detail->about)
                                <div class="col-sm-12 mt-2 col-12">
                                    <h4><span  style="border-bottom: 1.5px solid; ">Description</span> </h4>
                                    <div class="col-sm-12 text-justify mt-2 border col-12">
                                       <p class="my-2 ">{!! $company->company_detail->about !!}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>






    @endsection
