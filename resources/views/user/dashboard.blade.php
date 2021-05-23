@extends('layouts.user')
@section('title', 'Dashboard')

@section('css')

@endsection
@section('content')


    <div class="row">
        @php
            $count_comp=countCompanies();
            $count_jobs=countJobs();
            $user=auth()->user();
        @endphp
        <div class=" col-md-6">
            <div class="d-flex mb-4">
                <span class="text-primary h1 mb-0"><span class="counter-value display-1 fw-bold" data-target="{{$count_comp}}">{{$count_comp}}</span>+</span>
                <span class="h6 align-self-end ms-2">Follow <br> Companies</span>
            </div>
        </div>
        <div class=" col-md-6">
            <div class="d-flex  mb-4">
                <span class="text-primary h1 mb-0"><span class="counter-value display-1 fw-bold" data-target="{{$count_jobs}}">{{$count_jobs}}</span>+</span>
                <span class="h6 align-self-end ms-2">Favorite <br> Jobs</span>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="card shadow rounded border-0">
            <div class="card-body">
                <div class="invoice-top pb-4 border-bottom">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="logo-invoice mb-2 text-capitalize">{{$user->name}}</div>
                        </div><!--end col-->

                        <div class="col-md-5 mt-4 mt-sm-0">
                            <h5>Address :</h5>
                            <dl class="row mb-0">
                                <dt class="col-2 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin fea icon-sm"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></dt>
                                <dd class="col-10 text-muted">
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin" data-type="iframe" class="video-play-icon text-muted lightbox">
                                        <p class="mb-0">1419 Riverwood Drive,</p>
                                        <p class="mb-0">Redding, CA 96001</p>
                                    </a>
                                </dd>

                                <dt class="col-2 text-muted"><i class="uil uil-envelope"></i></dt>
                                <dd class="col-10 text-muted">
                                    <a href="mailto:contact@example.com" class="text-muted">{{$user->email}}</a>
                                </dd>

                                <dt class="col-2 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone fea icon-sm"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></dt>
                                <dd class="col-10 text-muted">
                                    <a href="tel:+152534-468-854" class="text-muted">(+12) 1546-456-856</a>
                                </dd>
                            </dl>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>

                <div class="invoice-middle py-4">
                    <h5>Invoice Details :</h5>
                    <div class="row mb-0">
                        <div class="col-md-8 order-2 order-md-1">
                            <dl class="row">
                                <dt class="col-md-3 col-5 fw-normal">Invoice No. :</dt>
                                <dd class="col-md-9 col-7 text-muted">land45845621</dd>

                                <dt class="col-md-3 col-5 fw-normal">Name :</dt>
                                <dd class="col-md-9 col-7 text-muted">Calvin Carlo</dd>

                                <dt class="col-md-3 col-5 fw-normal">Address :</dt>
                                <dd class="col-md-9 col-7 text-muted">
                                    <p class="mb-0">1962 Pike Street,</p>
                                    <p class="mb-0">Diego, CA 92123</p>
                                </dd>

                                <dt class="col-md-3 col-5 fw-normal">Phone :</dt>
                                <dd class="col-md-9 col-7 text-muted">(+45) 4584-458-695</dd>
                            </dl>
                        </div>

                        <div class="col-md-4 order-md-2 order-1 mt-2 mt-sm-0">
                            <dl class="row mb-0">
                                <dt class="col-md-4 col-5 fw-normal">Date :</dt>
                                <dd class="col-md-8 col-7 text-muted">15th Oct, 2019</dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="invoice-table pb-4">
                    <div class="table-responsive bg-white shadow rounded">
                        <table class="table mb-0 table-center invoice-tb">
                            <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-bottom text-start">No.</th>
                                <th scope="col" class="border-bottom text-start">Item</th>
                                <th scope="col" class="border-bottom">Qty</th>
                                <th scope="col" class="border-bottom">Rate</th>
                                <th scope="col" class="border-bottom">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row" class="text-start">1</th>
                                <td class="text-start">Inclusive Insights</td>
                                <td>2</td>
                                <td>$ 2600</td>
                                <td>$ 5200</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">2</th>
                                <td class="text-start">Handy Guide</td>
                                <td>1</td>
                                <td>$ 3660</td>
                                <td>$ 3660</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-start">3</th>
                                <td class="text-start">Premiere Product</td>
                                <td>3</td>
                                <td>$ 4580</td>
                                <td>$ 13740</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-5 ms-auto">
                            <ul class="list-unstyled h6 fw-normal mt-4 mb-0 ms-md-5 ms-lg-4">
                                <li class="text-muted d-flex justify-content-between">Subtotal :<span>$ 22600</span></li>
                                <li class="text-muted d-flex justify-content-between">Taxes :<span> 0</span></li>
                                <li class="d-flex justify-content-between">Total :<span>$ 22600</span></li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>

                <div class="invoice-footer border-top pt-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-sm-start text-muted text-center">
                                <h6 class="mb-0">Customer Services : <a href="tel:+152534-468-854" class="text-warning">(+12) 1546-456-856</a></h6>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-sm-end text-muted text-center">
                                <h6 class="mb-0"><a href="page-terms.html" target="_blank" class="text-primary">Terms &amp; Conditions</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
