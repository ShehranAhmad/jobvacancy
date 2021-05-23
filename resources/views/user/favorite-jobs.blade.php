@extends('layouts.user')
@section('title', 'Favorite Jobs')

@section('css')

@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 col-12 mt-1 pt-2">
            <h4 style="border-bottom: 1.5px solid">Favorite Jobs</h4>
            <div class="row">
                @foreach($favorites as $favorite)
                    @php
                        $job=$favorite->job;
                        $company=$job->company;
                    @endphp
                    <div class="col-md-12 mb-3">
                        <div class="card shadow pricing-rates">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 mt-2 col-sm-5 col-5">
                                        <img class="w-100" style="height: 125px" src="{{asset($company->avatar??'front/images/3.jpg')}}">
                                        @if(Auth::user() && Auth::user()->role=='employee')
                                            <div class="text-center mt-2">
                                                @php
                                                    $followed=Auth::user()->user_followup->where('company_id',$company->id);

                                                @endphp
                                                <a href="#"  class="text-primary btn-follow follow-{{$company->id}}" @if(count($followed)>0) style="display: none;"  @endif  title="Follow Company" data-company="{{$company->id}}"> + Follow</a>
                                                <a href="#"  class="text-danger btn-unfollow unfollow-{{$company->id}}" @if(count($followed)==0)  style="display: none;" @endif  title="Un follow Company" data-company="{{$company->id}}"> -  Unfollow</a>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-9 col-sm-7 col-7">
                                        <a class="float-start" href="{{route('company.detail',$company->slug)}}">
                                            <h5 class="text-capitalize">{{$company->name}}</h5>
                                        </a>
                                        @if($job->is_featured==true)
                                            <a href="javascript:void(0)" class="float-end badge badge-link  bg-success" >Premium</a>
                                        @endif
                                        <div class="">
                                            <table class="table mb-0 table-center table-nowrap">

                                                <tbody>
                                                <tr>
                                                    <th scope="row" colspan="2">
                                                        <a href="{{route('job.detail',$job->slug)}}" class="text-capitalize mb-0 pt-2 float-start h5">
                                                            {{$job->title}}
                                                        </a>

                                                            <a href="{{route('employee.remove.job',$favorite->id)}}" class="float-end btn btn-icon  btn-danger "  title="Remove job from favorites"><i data-feather="heart" class="icons"></i></a>

                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><span class="font-weight-bold">Job Type</span> &nbsp;&nbsp;&nbsp; {{$job->employee_type}}</td>
                                                    <td scope="row"><span class="font-weight-bold">Location</span> &nbsp;&nbsp;&nbsp; {{$job->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td scope="row" colspan="2"><span class="font-weight-bold">Category</span> &nbsp;&nbsp;&nbsp;
                                                        @php
                                                            $categories=explode(',',$job->category)
                                                        @endphp
                                                        @foreach($categories as $cate)
                                                            <span class="badge bg-soft-primary">{{$cate}}</span>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
            <div class="row mt-3 justify-content-center">
                {{$favorites->links()}}
            </div>




        </div><!--end col-->
    </div>


    @endsection
