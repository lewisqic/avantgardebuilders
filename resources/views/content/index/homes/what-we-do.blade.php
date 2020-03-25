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
                    <p>As a leading builder of custom homes in Sanpete, we provide a uniquely transparent building experience with the design options you choose. Those personal details ensure your home feels right for you.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h4 class="text-ag">Custom Plans</h4>
                    <img src="{{ url('images/custom-plans.jpg') }}" alt="" class="img-thumbnail w-100 my-3">
                    <p>Starting from scratch or making changes to existing plans, it's all included in your building process.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mx-3">
                    <h4 class="text-ag">Estimates</h4>
                    <img src="{{ url('images/estimate.jpg') }}" alt="" class="img-thumbnail w-100 my-3">
                    <p>For our easy to use estimates calculator, <a href="{{ url('homes/quick-estimate') }}">click here</a>.</p>
                </div>
            </div>
        </div>

        <hr>

        <h4 class="text-ag mt-5">House Plan Archive</h4>

        <div class="row">
            @foreach ($plans as $plan)
                <div class="col-sm-3 mb-5">
                    <a href="{{ url('library/' . $plan . '.pdf') }}" target="_blank"><img src="{{ url('library/' . $plan . '.jpg') }}" class="w-100"></a>
                </div>
            @endforeach
        </div>

    </div>


@endsection

@push('scripts')

@endpush