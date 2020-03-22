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
                Premier Large Scale Construction Projects.
                <br>
                Licensed in Utah, Arizona, Idaho, South Dakota and North Dakota.
            </h4>
            <hr>
            <p class="text-center">
                Website under construction, please try again later.
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