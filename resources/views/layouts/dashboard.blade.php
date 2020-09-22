<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>

    <link rel="apple-touch-icon" href="{{asset('assets/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/toggle/switchery.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/ui/dragula.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/forms/selects/select2.min.css')}}">

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/app-assets/vendors/css/charts/morris.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/custom-rtl.css')}}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/plugins/forms/switch.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/pages/timeline.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/app-assets/css-rtl/pages/dashboard-ecommerce.css')}}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/assets/css/style-rtl.css')}}">
    <!-- END Custom CSS-->
</head>


<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<!-- fixed-top-->
@include('dashboard.includes.nav')
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.sidebar')

<div class="app-content content">
    <div class="content-wrapper">

        @yield('body_header')
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@include('dashboard.includes.footer')

@yield('scripts')
<!-- BEGIN VENDOR JS-->
<script src="{{asset('assets/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>


<!-- End VENDOR JS-->
<!--Start data table import -->
<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript">
</script>

<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}"
        type="text/javascript"></script>

<script src="{{asset('assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}" type="text/javascript"></script>
<!--End data table import -->

<script src="{{asset('assets/app-assets/vendors/js/forms/toggle/switchery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app-assets/vendors/js/extensions/dragula.min.js')}}" type="text/javascript"></script>

<!--Start data table import -->
<!-- BEGIN PAGE pdf and print JS-->
{{--for section search--}}
<script src="{{asset('assets/app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/app-assets/js/scripts/forms/select/form-select2.js')}}" type="text/javascript"></script>
<!--End data table import -->

<script src="{{asset('assets/app-assets/vendors/js/tables/buttons.html5.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app-assets/vendors/js/tables/buttons.print.min.js')}}" type="text/javascript"></script>
<!-- END PAGE pdf and print JS-->


<!-- BEGIN MODERN JS-->
<script src="{{asset('assets/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app-assets/js/core/app.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('assets/app-assets/js/scripts/extensions/drag-drop.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script src="{{asset('assets/app-assets/js/scripts/tables/datatables/datatable-advanced.js')}}"
        type="text/javascript"></script>
<script src="{{asset('assets/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-print.js')}}"
        type="text/javascript"></script>
</body>

</html>
