@extends('layouts.admin')

@section('content')

{!! Breadcrumbs::render('admin/documents') !!}

<div class="float-right">
    <a href="{{ url('admin/documents/create?_ajax=false') }}" class="btn btn-primary open-sidebar"><i class="fal fa-plus-circle"></i> Add Document</a>
</div>
<h2>
    <span>{!! Html::pageIcon('fal fa-file-alt') !!} Documents</span>
</h2>

<div class="content card">
    <div class="card-body">

        <div class="dataTable-filters">
            <div class="abc-checkbox abc-checkbox-primary form-check form-check-inline">
                <input type="checkbox" id="with_trashed">
                <label class="form-check-label" for="with_trashed">Show Deleted</label>
            </div>
        </div>
        <table id="list_documents_table" class="dataTable table table-striped table-hover" data-url="{{ url('admin/documents/data') }}" data-params='{}'>
            <thead>
            <tr>
                <th data-name="user">Client</th>
                <th data-name="type">Type</th>
                <th data-name="label">Label</th>
                <th data-name="filename">File</th>
                <th data-name="created_at" data-o-sort="true" data-order="primary-desc">Date Created</th>
                {!! Html::dataTablesActionColumn() !!}
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

@endsection