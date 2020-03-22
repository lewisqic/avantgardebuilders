@extends('layouts.index')

@section('content')

    <div class="options-wrapper">
        <div class="container">


            <div class="row">
                <div class="col-sm-4">

                    <div class="landing-option homes" data-href="{{ url('homes') }}">
                        <div class="hover-overlay"></div>
                        <h2 class="font-weight-normal">Homes</h2>
                        <p>Premier Home Builders serving the Sanpete Utah area</p>
                        <span class="">
                            Visit Homes <i class="fal fa-angle-double-right"></i>
                        </span>
                    </div>

                </div>
                <div class="col-sm-4">

                    <div class="landing-option builders" data-href="{{ url('builders') }}">
                        <div class="hover-overlay"></div>
                        <h2 class="font-weight-normal">Builders</h2>
                        <p>Premier Large Scale Construction Projects. Licensed in Utah, Arizona, Idaho, S. Dakota and N. Dakota</p>
                        <span class="">
                            Visit Builders <i class="fal fa-angle-double-right"></i>
                        </span>
                    </div>

                </div>
                <div class="col-sm-4">

                    <div class="landing-option excavators" data-href="{{ url('excavators') }}">
                        <div class="hover-overlay"></div>
                        <h2 class="font-weight-normal">Excavators</h2>
                        <p>Excavation, Rock walls, Landscaping, and Under Ground Utilities</p>
                        <span class="">
                            Visit Excavators <i class="fal fa-angle-double-right"></i>
                        </span>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="my-7">
            <h4 class="font-weight-normal text-center text-muted">
                Avant-Garde Builders has a proud tradition of quality service since 1995.
            </h4>
            <hr>
            <p class="text-center">
                Formally known as Far West Construction, we've recently been re-branded as Avant-Garde Builders and Avant-Garde Homes.
                <br>Same great people, same proven track record, just a new name.
                <br>We are as dedicated as ever to maintaining our long-standing track record of quality projects and professional service.
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