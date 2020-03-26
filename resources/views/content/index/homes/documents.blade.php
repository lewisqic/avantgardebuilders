@extends('layouts.homes')

@section('title', 'General Documents')

@section('content')

    <div class="page-heading homes-sub">
        <div class="container">

            <h1>
                <span>General <span class="text-ag-light">Documents</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">

        <div class="row">
            <div class="col-sm-4">
                <h4 class="text-ag">Example Estimate</h4>
                <hr>
                <p>See an example of what a House Estimate will look like.</p>
                <a href="{{ url('library/Example Estimate.pdf') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
            <div class="col-sm-4">
                <h4 class="text-ag">Project Questionnaire</h4>
                <hr>
                <p>Please fill out before we start the estimate to give you the most accurate estimate possible.</p>
                <a href="{{ url('library/Project Questionnaire.docx') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
            <div class="col-sm-4">
                <h4 class="text-ag">Trim Questionnaire</h4>
                <hr>
                <p>Please fill out after the contract is signed.</p>
                <a href="{{ url('library/Trim Questionaire.docx') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
        </div>

    </div>


@endsection

@push('scripts')

@endpush