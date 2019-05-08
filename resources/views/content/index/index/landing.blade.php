@extends('layouts.index')

@section('content')

    <div class="options-wrapper">
        <div class="container">


            <div class="row">
                <div class="col-sm-6">
                    <div class="mx-6">
                        <div class="landing-option homes" data-href="{{ url('homes') }}">
                            <div class="hover-overlay"></div>
                            <h2 class="font-weight-normal">Homes</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloremque, eius inventore nihil nobis provident quasi quibusdam ratione similique ut!</p>
                            <span class="">
                                Visit Homes <i class="fal fa-angle-double-right"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mx-6">
                        <div class="landing-option builders" data-href="{{ url('builders') }}">
                            <div class="hover-overlay"></div>
                            <h2 class="font-weight-normal">Builders</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore doloremque, eius inventore nihil nobis provident quasi quibusdam ratione similique ut!</p>
                            <span class="">
                                Visit Builders <i class="fal fa-angle-double-right"></i>
                            </span>
                        </div>
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
                Formally known as Far West Construction, we've recently been re-branded as Avant-Garde Builders and Avant-Gard Homes.
                <br>Same great people, same proven track record, just a fancy new name.
                <br>We're as dedicated as ever to maintaining our long-standing track record of quality products and professional service.
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