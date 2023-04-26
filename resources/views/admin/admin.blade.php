<!doctype html>
<html lang="en-US">
<head>
    <base href="/" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ML Repuestos</title>

    <link rel="stylesheet" href={{asset("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css")}}>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <!-- CSS
    @yield('css')
 ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12 text-center">
                <h3>
                ML Repuestos BackOffice
                </h3>
        </div>
    </div>
</div>

@component('admin.components.header.adminHeaderMain')
@endcomponent

@yield('content')



<script src="{{asset('js/app.js')}}"></script>

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

@yield('script')
</body>
</html>
