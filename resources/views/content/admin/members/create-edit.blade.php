@extends(\Request::ajax() ? 'layouts.ajax' : 'layouts.admin')

@section('content')

@if ( isset($user) )
    {!! Breadcrumbs::render('admin/members/edit', $user) !!}
@else
    {!! Breadcrumbs::render('admin/members/create') !!}
@endif

<h2>
    <span>{!! Html::pageIcon('fal fa-users') !!} {{ $title }} Client <small>{{ $user->name ?? '' }}</small></span>
</h2>

<div class="content card">
    <div class="card-body">

        <form action="{{ url('admin/members' . (isset($user) ? '/' . $user->id : '')) }}" method="post" class="validate tabs labels-right" id="create_edit_member_form">
            <input type="hidden" name="user[ignore_permissions]" value="1">
            <input type="hidden" name="user[id]" value="{{ $user->id ?? '' }}">
            {!! Html::hiddenInput(['method' => isset($user) ? 'put' : 'post']) !!}

            <div class="form-group row">
                <label class="col-form-label col-sm-3">First Name</label>
                <div class="col-sm-9">
                    <input type="text" name="user[first_name]" class="form-control" placeholder="First Name" value="{{ $user->first_name ?? old('first_name') }}" data-fv-notempty="true" data-fv-stringlength="true" data-fv-stringlength-min="2" data-fv-stringlength-max="80" autofocus>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Last Name</label>
                <div class="col-sm-9">
                    <input type="text" name="user[last_name]" class="form-control" placeholder="Last Name" value="{{ $user->last_name ?? old('last_name') }}" data-fv-notempty="true" data-fv-stringlength="true" data-fv-stringlength-min="2" data-fv-stringlength-max="80">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Email</label>
                <div class="col-sm-9">
                    <input type="text" name="user[email]" class="form-control" placeholder="Email" value="{{ $user->email ?? old('email') }}" data-fv-notempty="true" data-fv-emailaddress="true">
                </div>
            </div>

            @if ( isset($user) )
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <div class="abc-checkbox abc-checkbox-primary form-check form-check-inline">
                            <input type="checkbox" class="toggle-content" id="change_password" data-toggle=".password-fields">
                            <label class="form-check-label" for="change_password">Change Password</label>
                        </div>
                    </div>
                </div>
            @endif

            <div class="password-fields ignore-validation {{ isset($user) ? 'hide' : '' }}">

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="user[password]" id="user_password" class="form-control" placeholder="Password" value="" data-fv-notempty="true" data-fv-stringlength="true" data-fv-stringlength-min="6" autocomplete="off">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-sm-3">Confirm Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="user[password_confirmation]" class="form-control" placeholder="Confirm Password" value="" data-fv-notempty="true" data-fv-stringlength="true" data-fv-stringlength-min="6" data-fv-identical="true" data-fv-identical-field="password" autocomplete="off">
                    </div>
                </div>

            </div>

            <div class="form-group row mt-5">
                <div class="col-sm-9 ml-auto">
                    <button type="submit" class="btn btn-primary " data-loading-text="<i class='fa fa-circle-notch fa-spin fa-lg'></i>"><i class="fa fa-check"></i> Save</button>
                    <a href="#" class="btn btn-secondary close-sidebar">Cancel</a>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection


@push('scripts')

    <script type="text/javascript">

    </script>
@endpush