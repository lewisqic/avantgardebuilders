@extends('layouts.homes')

@section('title', 'Contact Us')

@section('content')

    <div class="page-heading homes-sub">
        <div class="container">

            <h1>
                <span>Contact <span class="text-ag-light">Us</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">


        <div class="row mb-5">
            <div class="col-lg-4">

                <div class="contact-left mb-lg-0 mb-5">

                    <p class="font-18 mb-5">Whether inquiring about the services we have to offer, touching base on an existing job, or just saying hello, we'd love to hear from you!</p>

                    <div class="font-20 text-muted mb-3">
                        <i class="fa fa-phone text-black mr-3"></i> 435-555-1234
                    </div>
                    <div class="font-20 text-muted">
                        <i class="fa fa-map-marker text-black ml-1 mr-3"></i> 123 Fake Street<br><span style="margin-left: 42px;">Mount Pleasant, UT 84647</span>
                    </div>

                </div>

            </div>
            <div class="col-lg-7 offset-lg-1">

                <form action="{{ url('homes/contact') }}" method="POST" class="validate" id="contact_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_ajax" value="true">
                    <input type="hidden" name="_recaptcha" value="">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="" data-fv-notempty="true">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="" data-fv-notempty="true">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email Address" value="" data-fv-notempty="true" data-fv-emailaddress="true">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="comments" class="form-control" rows="4" placeholder="Enter your comments here..." data-fv-notempty="true"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">

                        <div class="button-wrapper text-right">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check"></i> Submit</button>
                        </div>

                        <div class="progress-wrapper text-center hide">

                            <div class="text-muted mb-2">Delivering your message to Avant-Garde Homes...</div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                            </div>

                        </div>

                    </div>

                </form>

                <div class="alert alert-success alert-dark success-wrapper hide">
                    <i class="fa fa-check"></i> Success! Your message has been delivered, we'll be in touch soon!
                </div>

            </div>
        </div>


    </div>


@endsection

@push('scripts')

    <script src="https://www.google.com/recaptcha/api.js?render=6LdULqYUAAAAAGYe6fx9ZHVWFYxcw6n5JduBZ6RL"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LdULqYUAAAAAGYe6fx9ZHVWFYxcw6n5JduBZ6RL', {action: 'contact'}).then(function(token) {
                $('input[name="_recaptcha"]').val(token);
            });
        });
    </script>
    <script src="{{ url('assets/js/modules/contact.js') }}"></script>

@endpush