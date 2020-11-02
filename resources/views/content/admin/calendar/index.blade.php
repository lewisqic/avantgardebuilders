@extends('layouts.admin')

@section('content')

{!! Breadcrumbs::render('admin/calendar') !!}

<div class="float-right">
    <a href="{{ url('admin/calendar/create') }}" class="btn btn-primary open-sidebar"><i class="fal fa-plus-circle"></i> Add Event</a>
</div>
<h2>
    <span>{!! Html::pageIcon('fal fa-calendar') !!} Calendar</span>
</h2>

<div class="content card">
    <div class="card-body">

        <table id="list_calendar_table" class="dataTable table table-striped table-hover" data-url="{{ url('admin/calendar/data') }}" data-params='{}'>
            <thead>
            <tr>
                <th data-name="title">Title</th>
                <th data-name="description">Description</th>
                <th data-name="start_at" data-o-sort="true" data-order="primary-desc">Start Date</th>
                <th data-name="end_at" data-o-sort="true">End Date</th>
                <th data-name="is_active">Active</th>
                <th data-name="created_at" data-o-sort="true">Date Created</th>
                {!! Html::dataTablesActionColumn() !!}
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

@endsection