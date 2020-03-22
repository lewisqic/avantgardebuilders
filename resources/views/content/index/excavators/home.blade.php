@extends('layouts.excavators')

@section('content')

    <div class="page-heading excavators-home">
        <div class="container">

            <h1>
                <span>Avant-Garde <span class="text-ag-light">Excavators</span></span>
            </h1>

        </div>
    </div>

    <div class="container">
        <div class="my-7">
            <div class="text-center">
                <h4>Email: <a href="mailto:office@avantgardebuilders.net">office@avantgardebuilders.net</a></h4>
                <hr>
                <h4>Phone: Aaron Dennison, 435-262-1586</h4>
            </div>
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