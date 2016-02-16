<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!!  getenv('APP_NAME')!!}</title>

    <!-- Global stylesheets -->
    {!! Html::style('css/app.css')!!}
    {!! Html::style('https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900')!!}

    {!! Html::style('css/icons/icomoon/styles.css')!!}
    {!! Html::script('js/app.js') !!}




</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"><img src="/images/logo_light.png" alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>


</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <!-- Advanced login -->
                @include('layouts.flash')
                @include('errors.list')

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