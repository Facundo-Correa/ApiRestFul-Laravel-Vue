<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
 ========================= -->

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">


</head>
<body>
<div class="off_canvars_overlay">

</div>
<div id="app" style="/*background-color: #ebebeb*/">
    <app></app>
</div>

<script src="{{asset('js/app.js')}}"></script>

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="{{asset('assets/js/plugins.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>
