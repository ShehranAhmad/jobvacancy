@extends('layouts.admin')
@section('title','Setting')
@section('heading','Settings Control')


@section('content')

<section>
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Home Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Favicon</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="favicon" data-default-file="{{ asset($setting['favicon'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo Dark</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo" data-default-file="{{ asset($setting['logo'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Logo Light</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="logo_footer" data-default-file="{{ asset($setting['logo_footer'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Heading</label>
                                            <input type="text" value="{{$setting['banner_heading'] ?? ''}}" name="banner_heading" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Banner Description</label>
                                            <input type="text" value="{{$setting['banner_description'] ?? ''}}" name="banner_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Home Banner Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="home_banner" data-default-file="{{ asset($setting['home_banner'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Home Contact Banner</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="home_contact_banner" data-default-file="{{ asset($setting['home_contact_banner'] ?? '')  }}">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pages Banner Background 1</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="pages_banner_background1" data-default-file="{{ asset($setting['pages_banner_background1'] ?? '')  }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pages Banner Background 2</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="pages_banner_background2" data-default-file="{{ asset($setting['pages_banner_background2'] ?? '')  }}">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Footer Section</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Footer Description</label>
                                            <input type="text" value="{{$setting['footer_description'] ?? ''}}" name="footer_description" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Phone</label>
                                            <input type="text" value="{{$setting['phone'] ?? ''}}" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" value="{{$setting['email'] ?? ''}}" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Fax</label>
                                            <input type="text" value="{{$setting['fax'] ?? ''}}" name="fax" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Address</label>
                                            <input type="text" value="{{$setting['address'] ?? ''}}" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Copyright</label>
                                            <input type="text" value="{{$setting['copyright'] ?? ''}}" name="copyright" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Social Links</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Facebook</label>
                                            <input type="text" value="{{$setting['facebook'] ?? ''}}" name="facebook" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Instagram</label>
                                            <input type="text" value="{{$setting['instagram'] ?? ''}}" name="instagram" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Twitter</label>
                                            <input type="text" value="{{$setting['twitter'] ?? ''}}" name="twitter" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Linkedin</label>
                                            <input type="text" value="{{$setting['linkedin'] ?? ''}}" name="linkedin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Contact us page</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Contact us Image</label>
                                            <input type="file" class=" dropify dropify-event" id="fileChooser" name="contact_us_image" data-default-file="{{ asset($setting['contact_us_image'] ?? '')  }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="btn-group pull-right mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{route('admin.dashboard')}}" class="btn btn-danger">Close</a>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

