<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', '') {{ !\Request::is('homes') ? '|' : '' }} Avant-Garde Homes</title>

    <link rel="stylesheet" href="{{ url('css/core.css') }}">
    @stack('styles')

</head>
<body>

<div class="header">
    <div class="container">

        <div class="visit">
            <a href="{{ url('') }}"><i class="fal fa-angle-double-left"></i> Visit Builders</a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ url('homes') }}" class="navbar-brand">
                <img src="{{ url('images/ag-homes.jpg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header_nav" aria-controls="header_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header_nav">
                <ul class="navbar-nav ml-7">
                    <li class="nav-item {{ \Request::is('homes/what-we-do') ? 'active' : '' }}">
                        <a href="{{ url('homes/what-we-do') }}" class="nav-link">What We Do</a>
                    </li>
                    <li class="nav-item {{ \Request::is('homes/past-work') ? 'active' : '' }}">
                        <a href="{{ url('homes/past-work') }}" class="nav-link">Past Work</a>
                    </li>
                    <li class="nav-item {{ \Request::is('homes/our-partners') ? 'active' : '' }}">
                        <a href="{{ url('homes/our-partners') }}" class="nav-link">Our Partners</a>
                    </li>
                    <li class="nav-item {{ \Request::is('homes/about-us') ? 'active' : '' }}">
                        <a href="{{ url('homes/about-us') }}" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item {{ \Request::is('homes/contact') ? 'active' : '' }}">
                        <a href="{{ url('homes/contact') }}" class="nav-link">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ url('auth/login') }}" class="nav-link font-16"><i class="fal fa-lock"></i> Client Login</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>

@yield('content')

@include('partials.index.footer');

{!! Js::config(true) !!}
<script src="{{ url('js/vendor.js') }}"></script>
<script src="{{ url('js/core.js') }}"></script>
@stack('scripts')
</body>
</html>
