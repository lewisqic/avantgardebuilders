<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Avant-Garde Builders</title>

    <link rel="stylesheet" href="{{ url('css/core.css') }}">

</head>
<body>

<div class="header">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img src="{{ url('images/ag-logo.jpg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header_nav" aria-controls="header_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="header_nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Services</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Our Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Company</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>

    </div>
</div>

@yield('content')

<div class="footer">
    <div class="container">

        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; {{ date('Y') }} Avant-Garde Builders, All Rights Reserved
            </div>
            <div class="col-sm-6 text-right">
                123 Fake Street, Mount Pleasant, UT
                <span class="ml-4">800-123-4567</span>
            </div>
        </div>

    </div>
</div>

{!! Js::config(true) !!}
<script src="{{ url('js/vendor.js') }}"></script>
<script src="{{ url('js/core.js') }}"></script>
@stack('scripts')
</body>
</html>
