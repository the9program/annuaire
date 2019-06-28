<!DOCTYPE html>
<!-- Program Created BY LY -->

<html {!! (session('locale') == 'ar') ? "dir='rtl'" : '' !!}  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="LY"/>
    <meta name="keywords"
          content=" clinic, dental, doctor, health, hospital, medical, medicine, therapy"/>
    <meta name="LY" content="LY"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>LY</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Favicon and Touch Icons -->
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" type="image/png">
    <link href="{{ asset('images/apple-touch-icon.png') }}" rel="icon">
    <link href="{{ asset('images/apple-touch-icon-72x72.png') }}" rel="icon" sizes="72x72">
    <link href="{{ asset('images/apple-touch-icon-114x114.png') }}" rel="icon" sizes="114x114">
    <link href="{{ asset('images/apple-touch-icon-144x144.png') }}" rel="icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/css-plugin-collections.css') }}" rel="stylesheet"/>
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{ asset('css/menuzord-skins/menuzord-boxed.css') }}" rel="stylesheet"/>
    <!-- CSS | Main style file -->
    <link href="{{ asset('css/style-main.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{ asset('css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css">

    <!-- Revolution Slider 5.x CSS settings -->
    <link href="{{ asset('js/revolution-slider/css/settings.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('js/revolution-slider/css/layers.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('js/revolution-slider/css/navigation.css') }}" rel="stylesheet" type="text/css"/>

    <!-- CSS | Theme Color -->
    <link href="{{ asset('css/colors/theme-skin-blue.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <!-- external javascripts -->

    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{ asset('js/jquery-plugin-collection.js') }}"></script>

    <!-- Revolution Slider 5.x SCRIPTS -->
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('js/revolution-slider/js/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
<!-- MENU -->
@include('layouts.sidebar')
<div id="wrapper" class="clearfix">
    <!-- preloader -->
@include('layouts.preload')

<!-- Header -->
@include('layouts.navbar')

<!-- Start main-content -->
    <div class="main-content">
        <div class="container">
            @include('layouts.alerts')
        </div>
        @yield('content')
    </div>
    <!-- end main-content -->

    <!-- Footer -->
    @include('layouts.footer')
</div>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/template_localize.js') }}"></script>
</body>
</html>
