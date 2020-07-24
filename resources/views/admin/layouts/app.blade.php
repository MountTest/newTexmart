<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    {{--<meta name="viewport"--}}
          {{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">--}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель - Texmart.kg</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('img/favi.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('img/favi.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/main.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link  rel="stylesheet"  href = "{{asset("css/intlTelInput.min.css")}}">
    <style>

        .iti--separate-dial-code .iti__selected-flag {
            background-color: rgba(0,0,0,0);
        }
        .iti
        {
            width:100%;
        }
    </style>
    @stack('styles')
</head>
<body>
@include('admin.partials.header')
<div id="app" style="height:100%;">
@yield('content')
</div>
{{--<script src="https://kit.fontawesome.com/db4d90930c.js" crossorigin="anonymous"></script>--}}

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
{{--<script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>--}}
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--setTimeout(function () {--}}
            {{--$("body").removeClass('puff-in-center');--}}
            {{--menuShow();--}}
        {{--},1500);--}}
        {{--function menuShow()--}}
        {{--{--}}
            {{--$('.menuse').addClass('fade-in');--}}
        {{--}--}}
        {{--$(document).on('click', '.fade-link', function(event){--}}
            {{--event.preventDefault();--}}
            {{--linkLocation = this.href;--}}
            {{--$("body").fadeOut(1000, redirectPage);--}}
        {{--});--}}

        {{--function redirectPage() {--}}
            {{--window.location = linkLocation;--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
@stack('scripts')
</body>
</html>
