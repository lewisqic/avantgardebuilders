@extends('layouts.builders')

@section('content')

    <div class="page-heading builders-home">
        <div class="container">

            <h1>
                <span>Avant-Garde <span class="text-ag-light">Builders</span></span>
            </h1>

        </div>
    </div>

    <div class="container">
        <div class="my-7">
            <h4 class="font-weight-normal text-center text-muted">
                Website Under Construction
            </h4>
            <hr>
            <p class="text-center">
                Please try again later.
            </p>
        </div>
    </div>


@endsection

@push('scripts')

    <script>
        $('.landing-option').on('click', function() {
            let href = $(this).attr('data-href');
            window.location = href;
        });

    </script>

@endpush