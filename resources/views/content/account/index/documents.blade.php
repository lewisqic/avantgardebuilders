@extends('layouts.account')

@section('content')

    <h2><i class="fal fa-file-alt"></i> My Documents</h2>

    <div class="content card">
        <div class="card-body">

            @if (!empty($documents))

                <div class="nav nav-tabs page-tabs" id="nav-tab" role="tablist">
                    @foreach ($documents as $type => $docs)
                        <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab" href="#{{ str_slug($type) }}" role="tab">{{ $type }}</a>
                    @endforeach
                </div>
                <div class="tab-content page-tabs-content" id="nav-tabContent">
                    @foreach ($documents as $type => $docs)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ str_slug($type) }}" role="tabpanel">


                            @foreach ($docs as $doc)
                                @php $pathinfo = pathinfo(storage_path('app/public/' . $doc->path)); @endphp
                                @if (isset($pathinfo['extension']))
                                    <h4>
                                        <a href="{{ url('account/documents/download/' . base64_encode($doc->id)) }}" class="mr-5 font-18"><i class="fal fa-download"></i> Download</a>
                                        {{ $doc->filename }}
                                        <small class="text-muted font-18 font-weight-light">(Added on {{ $doc->created_at->toFormattedDateString() }})</small>
                                    </h4>
                                    @if (!$loop->last)
                                        <hr>
                                    @endif
                                @endif
                            @endforeach

                        </div>
                    @endforeach
                </div>

            @else
                <div class="text-center text-muted">
                    <em>no documents found</em>
                </div>
            @endif

        </div>
    </div>


@endsection

@push('scripts')


@endpush