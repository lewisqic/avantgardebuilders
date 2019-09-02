<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Client Area | Avant-Garde Homes</title>

    <link rel="stylesheet" id="adminly_css" href="{{ url('css/' . $css_file) }}">

</head>
<body class="adminly {{ $adminly_settings['layout']['header_style'] == 'sticky' ? 'allow-fixed-header' : '' }} {{ $adminly_settings['layout']['submenu_style'] == 'dropdown' ? 'submenu-dropdown-only' : '' }}">

<div class="header">
    <div class="bg-primary">
        <div class="container-fluid container-layout">
            <nav class="navbar navbar-expand-lg navbar-dark">

                <a class="navbar-brand" href="{{ url('account') }}">Avant-Garde Client Area</a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown dropdown-icon mr-6">
                            <a href="#" class="nav-link dropdown-toggle help-link" data-toggle="dropdown"><i class="fal fa-question-circle fa-lg"></i></a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow-right help animated fadeInUp">
                                <div class="dropdown-header"><i class="fal fa-question-circle mr-1"></i> Help/Feedback Form</div>
                                <form action="{{ url('account/help') }}" method="POST" class="validate" id="help_form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_ajax" value="true">
                                    <input type="hidden" name="first_name" value="{{ $auth_user->first_name }}">
                                    <input type="hidden" name="last_name" value="{{ $auth_user->last_name }}">
                                    <input type="hidden" name="email" value="{{ $auth_user->email }}">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <textarea name="comments" class="form-control" rows="4" placeholder="Enter your questions and/or comments here..." data-fv-notempty="true"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-2">

                                        <button type="submit" class="btn btn-primary btn-sm btn-block" data-loading-text="<i class='fa fa-circle-notch fa-spin fa-lg'></i>"><i class="fa fa-check"></i> Submit</button>

                                    </div>

                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle avatar-wrapper" data-toggle="dropdown">
                                <span class="name">Welcome, {{ $auth_user->first_name }}</span>
                                <span class="avatar">{!! $auth_user->avatar ? '<img src="' . Storage::url($auth_user->avatar) . '">' : '<i class="fal fa-user fa-lg"></i>' !!}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow-right animated fadeInUp">
                                <div class="dropdown-header bg-white text-black">
                                    <strong>{{ $auth_user->name }}</strong><br>{{ $auth_user->email }}
                                </div>
                                <a class="dropdown-item" href="{{ url('account/profile') }}"><i class="fal fa-id-card fa-fw text-primary mr-1"></i> My Profile</a>
                                <div class="dropdown-footer">
                                    <a class="dropdown-item" href="{{ url('auth/logout') }}"><i class="far fa-power-off fa-fw text-danger mr-1"></i> Sign Out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="bg-white">
        <div class="container-fluid container-layout">
            <div class="menu-wrapper">
                @php $has_submenu = false; @endphp
                <ul class="menu">

                    {{-- Documents --}}
                    <li class="{{ \Request::is('account/documents*') ? 'active' : '' }}"><a href="{{ url('account/documents') }}">Documents</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="submenu-bar-wrapper clearfix">
    <div class="container-fluid container-layout">
        <div class="submenu-bar-inner">
            @if ( $has_submenu )
                <div class="submenu-placeholder"></div>
            @endif
        </div>
    </div>
</div>

<div class="container-fluid container-layout content-wrapper">
    @yield('content')
</div>

<div id="datepicker-wrapper"></div>

<div class="sidebar-right" id="sidebar-right">
    <div class="cssload-container"><div class="cssload-whirlpool"></div></div>
    <div class="sidebar-wrapper"></div>
</div>
<a href="#" id="open-sidebar"></a>
<a href="#" id="close-sidebar" class="close-sidebar"></a>

{!! Js::config(true) !!}
<script src="{{ url('js/vendor.js') }}"></script>
<script src="{{ url('js/core.js') }}"></script>
<script src="{{ url('assets/js/modules/help.js') }}"></script>
@stack('scripts')
</body>
</html>
