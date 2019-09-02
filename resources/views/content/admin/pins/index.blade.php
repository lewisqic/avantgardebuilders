@extends('layouts.admin')

@section('content')

{!! Breadcrumbs::render('admin/pins') !!}

<div class="float-right">
    <a href="{{ url('admin/pins/create') }}" class="btn btn-primary open-sidebar"><i class="fal fa-plus-circle"></i> Add Pin</a>
</div>
<h2>
    <span>{!! Html::pageIcon('fal fa-map-pin') !!} Map Pins</span>
</h2>

<div class="content card">
    <div class="card-body">

        <table id="list_pins_table" class="dataTable table table-striped table-hover" data-url="{{ url('admin/pins/data') }}" data-params='{}'>
            <thead>
            <tr>
                <th data-name="label">Label</th>
                <th data-name="address">Address</th>
                <th data-name="year" data-order="primary-desc">Year</th>
                <th data-name="created_at" data-o-sort="true">Date Created</th>
                {!! Html::dataTablesActionColumn() !!}
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

@endsection