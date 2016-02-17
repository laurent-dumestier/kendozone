<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ getenv('APP_NAME') }}</title>


    <!-- Global stylesheets -->
    {!! Html::style('/css/icons/icomoon/styles.css')!!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900')!!}

    {!! Html::script('js/app.js')!!}
    {!! Html::style('css/app.css')!!}

    @yield('scripts')
    @yield('styles')

</head>
{{--sidebar-xs should be out--}}
<body class="sidebar-xs has-detached-right navbar-top">
@include('layouts.headmenu')


        <!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">
        {{--@include('layouts.sidemenu')--}}


                <!-- Main content -->
        <div class="content-wrapper">


            <!-- Page header -->
            <div class="page-header" >
                <div class="breadcrumb-line">
                    @yield('breadcrumbs')
                </div>
            </div>
            <!-- Content area -->

            <div class="content" id="content">
                @include('layouts.flash')
                @yield('content')

                @include('layouts.footer')
            </div>

            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

    {!! Html::script('js/analytics.js') !!}

    @yield('scripts_footer')

</body>
</html>