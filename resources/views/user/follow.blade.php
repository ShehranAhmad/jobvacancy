@extends('layouts.user')
@section('title', 'Followed Companies')

@section('css')

@endsection
@section('content')


    <div class="row">
        <div class="col-md-12 col-12 mt-1 pt-2">
            <h4 style="border-bottom: 1.5px solid">Followed Companies</h4>
            <div class="row">
                @foreach($follow as $favorite)
                    @php

                        $company=$favorite->company;
                    @endphp
                    <div class="col-md-4  mt-4 ">
                        <div class="card categories overflow-hidden rounded shadow-lg border-0">
                            <a href="{{route('company.detail',$company->slug)}}">
                                <img src="{{asset($company->avatar)}}" style="height: 82px;" class="img-fluid w-100" alt="">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between mb-0">
                                    <li><a href="{{route('company.detail',$company->slug)}}" class="title h6 text-primary">{{$company->name}}</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>

                @endforeach


            </div>
            <div class="row mt-3 justify-content-center">
                {{$follow->links()}}
            </div>




        </div><!--end col-->
    </div>


@endsection
