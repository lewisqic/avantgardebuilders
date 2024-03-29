<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Avant-Garde Excavators</title>

	<link rel="stylesheet" href="{{ url('css/core.css') }}">

</head>
<body class="public">

<div class="header">
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-light">
			<a href="{{ url('') }}" class="navbar-brand">
				<img src="{{ url('images/ag-logo.png') }}" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header_nav" aria-controls="header_nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="header_nav">
				{{--<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Contact Us</a>
					</li>
				</ul>--}}
			</div>
		</nav>

	</div>
</div>

@yield('content')

<div class="footer">
	<div class="container text-center">
		<div class="row font-18">
			<div class="col-sm-12">
				<div>1125 Blackhawk Blvd, Mount Pleasant, UT 84647</div>
				<div>
					<span>Aaron Dennison: 435-314-5681</span>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mt-3 text-center text-muted font-14 mb-2">
	Copyright &copy; {{ date('Y') }} Avant-Garde Builders, All Rights Reserved
</div>

{!! Js::config(true) !!}
<script src="{{ url('js/vendor.js') }}"></script>
<script src="{{ url('js/core.js') }}"></script>
@stack('scripts')
</body>
</html>
