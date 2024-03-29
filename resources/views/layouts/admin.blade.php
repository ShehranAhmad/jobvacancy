
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title') - Job Vac</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset($setting['favicon'] ?? '')  }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/pages/data-list-view.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/themes/semi-dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/dropify/css/dropify.min.css') }}">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/custom.css') }}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
    <!-- END: Page CSS-->
    @yield('css')

</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Navbar-->
@include('admin.components.navbar')
<!--End: Navbar-->

<!-- BEGIN: Sidebar-->
@include('admin.components.sidebar')
<!-- END: Sidebar-->



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<script src="{{ asset('admin/vendors/js/vendors.min.js') }}"></script>

<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
<script src="{{asset('admin/dropify/js/dropify.min.js') }}"></script>

<script src="{{ asset('admin/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('admin/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/js/core/app.js') }}"></script>
{{--    <script src="{{ asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>--}}
<script src="{{asset('admin/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>

<script src="{{ asset('admin/js/scripts/components.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('admin/js/scripts/ui/data-list-view.js') }}"></script>
<script src="{{ asset('admin/vendors/js/extensions/toastr.min.js') }}"></script>
{{--    <script src="{{ asset('admin/js/scripts/forms/select/form-select2.js')}}"></script>--}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script><!-- javascript -->

<script>
    $(document).ready(function(){
        $(function () {
            $(".datepicker").datepicker({
                autoclose: true,
                todayHighlight: true,
                startDate: '-0m',
                minDate: 0,
            });
        });
        var deleteID = document.querySelectorAll(".alert-confirm");
        deleteID.forEach(function(e) {
            e.addEventListener("click", function(event) {
                event.preventDefault();
                $url=$(this).attr("href");
                swal({
                    title: 'Are you sure?',
                    text: 'You want be to do this?',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            window.location.href = $url;
                        }

                    });
            });
        });
    });
</script>
<script>
    @if(session('message'))
    toastr.success("{{ session('message') }}");
    @elseif(session('error'))
    toastr.error("{{ session('error') }}");
    @endif
    $('.dropify').dropify();
</script>
<script>
    function deleteAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }
    function unblockAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to unblock!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, unblock it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }
    function blockAlert(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to block this company!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, block it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }

    function closeInquiry(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to close this inquiry!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, close it!'
        }).then((result) => {
            if (result.value) {
                location.href = url;
            }
        });
    }
</script>


@yield('js')

</body>
<!-- END: Body-->

</html>
