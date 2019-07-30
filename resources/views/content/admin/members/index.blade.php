@extends('layouts.admin')

@section('content')

{!! Breadcrumbs::render('admin/members') !!}

<div class="float-right">
    @if ( has_permission('admin.members.create') )
    <a href="{{ url('admin/members/create') }}" class="btn btn-primary open-sidebar"><i class="fal fa-plus-circle"></i> Add Client</a>
    @endif
</div>
<h2>
    <span>{!! Html::pageIcon('fal fa-users') !!} Clients</span>
</h2>

<div class="content card">
    <div class="card-body">

        <div class="dataTable-filters">
            <div class="abc-checkbox abc-checkbox-primary form-check form-check-inline">
                <input type="checkbox" id="with_trashed">
                <label class="form-check-label" for="with_trashed">Show Deleted</label>
            </div>
        </div>
        <table id="list_members_table" class="dataTable table table-striped table-hover" data-url="{{ url('admin/members/data') }}" data-params='{}'>
            <thead>
            <tr>
                <th data-name="name">Name</th>
                <th data-name="email">Email</th>
                <th data-name="created_at" data-o-sort="true" data-order="primary-desc">Date Created</th>
                {!! Html::dataTablesActionColumn() !!}
            </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>

@endsection