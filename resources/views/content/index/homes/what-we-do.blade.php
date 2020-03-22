@extends('layouts.homes')

@section('title', 'What We Do')

@section('content')

    <div class="page-heading homes-sub">
        <div class="container">

            <h1>
                <span>What We <span class="text-ag-light">Do</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">

        <div class="row">
            <div class="col-sm-4">
                <div class="mx-3">
                    <h4 class="text-ag">New Construction</h4>
                    <img src="{{ url('images/new-construction.jpg') }}" alt="" class="img-thumbnail w-100 my-3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci alias autem consectetur eligendi facilis ipsam iusto, maxime nesciunt quidem sunt!</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h4 class="text-ag">Custom Plans</h4>
                    <img src="{{ url('images/custom-plans.jpg') }}" alt="" class="img-thumbnail w-100 my-3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis debitis deleniti facere fugiat harum illo mollitia quod reiciendis, sapiente vitae?</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h4 class="text-ag">Estimates</h4>
                    <img src="{{ url('images/estimate.jpg') }}" alt="" class="img-thumbnail w-100 my-3">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi consequuntur culpa, esse est eum odit perferendis quibusdam quod repellendus.</p>
                </div>
            </div>
        </div>

    </div>


@endsection

@push('scripts')

@endpush