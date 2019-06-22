@extends('layouts.homes')

@section('content')

    <div class="page-heading homes-home">
        <div class="container">

            <h1>
                <span>Avant-Garde <span class="text-ag-light">Homes</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">

        <div class="row home-tiles">
            <div class="col-sm-4" data-href="{{ url('homes/what-we-do') }}">
                <div class="img-wrapper cad">
                    <h5>Our Services</h5>
                    <img src="{{ url('images/home-services.jpg') }}" alt="">
                </div>
                From custom house plans to general contracting, find out what we can do for you.
            </div>
            <div class="col-sm-4" data-href="{{ url('homes/quick-estimate') }}">
                <div class="img-wrapper on-site">
                    <h5>Quick Home Estimate</h5>
                    <img src="{{ url('images/home-estimate.jpg') }}" alt="">
                </div>
                Use our online quick estimate tool to get an idea of what your new home might cost.
            </div>
            <div class="col-sm-4" data-href="{{ url('homes/documents') }}">
                <div class="img-wrapper off-site">
                    <h5>General Documents</h5>
                    <img src="{{ url('images/home-documents.jpg') }}" alt="">
                </div>
                Download useful documents such as our starter questionnaire or sample estimate page.
            </div>
        </div>

        <hr class="my-7">

        <h3 class="text-center">What Makes Us Different?</h3>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis debitis quos veniam? A dicta minus nam nemo nihil non odit officiis optio possimus recusandae repellendus sed similique, suscipit tempore voluptatibus!  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis debitis quos veniam? A dicta minus nam nemo nihil non odit officiis optio possimus recusandae repellendus sed similique, suscipit tempore voluptatibus!
        </p>

    </div>

    <div class="home-guarantee">
        <div class="container">
            <h2>Mission Statement / Our Guarantee</h2>
            <p>
                <em>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A atque cumque eum labore tempora! Atque cum distinctio ducimus<br>
                    esse et ex magni minima minus, nostrum porro possimus quasi quidem repudiandae rerum sapiente sit tenetur.</em>
            </p>
        </div>
    </div>

    <div class="container">

        <div class="text-center mb-7 font-20 text-muted">
            Based out of Mount Pleasant, UT. Happily serving all of Sanpete County.
        </div>

    </div>


@endsection

@push('scripts')

    <script>
        $('.home-tiles > div').on('click', function(e) {
            e.preventDefault();
            window.location = $(this).attr('data-href');
        });
    </script>

@endpush