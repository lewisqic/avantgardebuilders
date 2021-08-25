@extends(\Request::ajax() ? 'layouts.ajax' : 'layouts.admin')

@section('content')

@if ( isset($document) )
    {!! Breadcrumbs::render('admin/documents/edit', $document) !!}
@else
    {!! Breadcrumbs::render('admin/documents/create') !!}
@endif

<h2>
    <span>{!! Html::pageIcon('fal fa-file-alt') !!} {{ $title }} Document </span>
</h2>

<div class="content card">
    <div class="card-body">

        <form action="{{ url('admin/documents' . (isset($document) ? '/' . $document->id : '')) }}" method="post" class="validate tabs labels-right" id="create_edit_member_form"  enctype="multipart/form-data">
            {!! Html::hiddenInput(['method' => isset($document) ? 'put' : 'post']) !!}

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Document Type</label>
                <div class="col-sm-9">
                    <select name="type" class="form-control" data-fv-notempty="true">
                        <option value="">- select type -</option>
                        <option value="Contractor Schedule">Contractor Schedule</option>
                        @foreach ( $types as $type )
                            <option value="{{ $type }}" {{ isset($document) && $document->type == $type ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row client-wrapper">
                <label class="col-form-label col-sm-3">Client</label>
                <div class="col-sm-9">
                    <select name="user_id" class="form-control">
                        <option value="">- select client -</option>
                        @foreach ( $users as $user )
                        <option value="{{ $user->id }}" {{ isset($document) && $document->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Label</label>
                <div class="col-sm-9">
                    <input type="text" name="label" class="form-control" placeholder="Label" value="{{ $document->label ?? old('label') }}" data-fv-notempty="true">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">File</label>
                <div class="col-sm-9 form-control-static">

                    @if ( isset($document) && $document->filename )
                        {{ $document->filename }}
                        <br>
                        <div class="abc-checkbox abc-checkbox-primary form-check">
                            <input type="checkbox" name="delete_file" id="delete_file" value="1">
                            <label class="form-check-label" for="delete_file">Delete File</label>
                        </div>
                    @else
                        <input type="file" name="file">
                    @endif

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
        $('[name="type"]').on('change', function() {
            if ($('[name="type"] option:selected').val() === 'Contractor Schedule') {
                $('.client-wrapper').hide();
                $('[name="user_id"]').val('');
            } else {
                $('.client-wrapper').show();
            }
        });
    </script>
@endpush