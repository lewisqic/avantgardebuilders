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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias autem consectetur eligendi facilis ipsam iusto, maxime nesciunt quidem sunt!</p>
                <a href="{{ url('library/Example Estimate.pdf') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
            <div class="col-sm-4">
                <h4 class="text-ag">Trim Questionnaire</h4>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis debitis deleniti facere fugiat harum illo mollitia quod reiciendis, sapiente vitae?</p>
                <a href="{{ url('library/Trim Questionaire.docx') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
            <div class="col-sm-4">
                <h4 class="text-ag">Project Questionnaire</h4>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi consequuntur culpa, esse est eum odit perferendis quibusdam quod repellendus.</p>
                <a href="{{ url('library/Project Questionnaire.docx') }}" target="_blank" class="btn btn-sm btn-primary"><i class="fal fa-download"></i> Download</a>
            </div>
        </div>

    </div>


@endsection

@push('scripts')

@endpush