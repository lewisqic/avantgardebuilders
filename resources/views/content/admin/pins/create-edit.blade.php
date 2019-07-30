@extends(\Request::ajax() ? 'layouts.ajax' : 'layouts.admin')

@section('content')

@if ( isset($pin) )
    {!! Breadcrumbs::render('admin/pins/edit', $pin) !!}
@else
    {!! Breadcrumbs::render('admin/pins/create') !!}
@endif

<h2>
    <span>{!! Html::pageIcon('fal fa-map-pin') !!} {{ $title }} Pin </span>
</h2>

<div class="content card">
    <div class="card-body">

        <form action="{{ url('admin/pins' . (isset($pin) ? '/' . $pin->id : '')) }}" method="post" class="validate tabs labels-right" id="create_edit_member_form">
            {!! Html::hiddenInput(['method' => isset($pin) ? 'put' : 'post']) !!}

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Label</label>
                <div class="col-sm-9">
                    <input type="text" name="label" class="form-control" placeholder="Label" value="{{ $pin->label ?? old('label') }}" data-fv-notempty="true">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Address</label>
                <div class="col-sm-9">
                    <textarea name="address" class="form-control" rows="3" placeholder="Pin Address" data-fv-notempty="true" autofocus>{{ $pin->address ?? old('address') }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Year</label>
                <div class="col-sm-9">
                    <input type="text" name="year" class="form-control" placeholder="Year" value="{{ $pin->year ?? old('year') }}" data-fv-notempty="true">
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