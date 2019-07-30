<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avant-Garde Builders</title>

    <link rel="stylesheet" href="{{ url('css/core.css') }}">

</head>
<body class="public">

<div class="header">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{ url('') }}">
                <img src="{{ url('images/ag-builders.jpg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header_nav" aria-controls="header_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header_nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('homes') }}">Homes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('builders') }}">Builders</a>
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
