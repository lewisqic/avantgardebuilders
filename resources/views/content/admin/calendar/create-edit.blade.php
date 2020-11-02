@extends(\Request::ajax() ? 'layouts.ajax' : 'layouts.admin')

@section('content')

@if ( isset($event) )
    {!! Breadcrumbs::render('admin/calendar/edit', $event) !!}
@else
    {!! Breadcrumbs::render('admin/calendar/create') !!}
@endif

<h2>
    <span>{!! Html::pageIcon('fal fa-calendar') !!} {{ $title }} Calendar Event </span>
</h2>

<div class="content card">
    <div class="card-body">

        <form action="{{ url('admin/calendar' . (isset($event) ? '/' . $event->id : '')) }}" method="post" class="validate tabs labels-right" id="create_edit_member_form">
            {!! Html::hiddenInput(['method' => isset($event) ? 'put' : 'post']) !!}

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Title</label>
                <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $event->title ?? old('title') }}" data-fv-notempty="true">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Description</label>
                <div class="col-sm-9">
                    <textarea name="description" class="form-control" rows="3" placeholder="Description">{{ $event->description ?? old('description') }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Start Date</label>
                <div class="col-sm-9">
                    <input type="text" name="start_at" class="form-control datepicker" placeholder="mm/dd/yyyy" value="{{ isset($event->start_at) ? $event->start_at->format('m/d/Y') : '' }}" data-fv-notempty="true">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">End Date</label>
                <div class="col-sm-9">
                    <input type="text" name="end_at" class="form-control datepicker" placeholder="mm/dd/yyyy" value="{{ isset($event->end_at) ? $event->end_at->format('m/d/Y') : '' }}" data-fv-notempty="true">
                </div>
            </div>

            <div class="form-group row mt-4">
                <div class="col-sm-9 ml-auto">
                    <div class="abc-checkbox abc-checkbox-primary form-check form-check-inline">
                        <input type="checkbox" name="is_active" class="toggle-content" id="is_active" {{ empty($event) || $event->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
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