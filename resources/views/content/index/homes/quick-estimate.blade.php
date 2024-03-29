@extends('layouts.homes')

@section('title', 'Quick Home Estimate')

@section('content')

    <div class="page-heading homes-sub">
        <div class="container">

            <h1>
                <span>Quick Home <span class="text-ag-light">Estimate</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">

        <p class="font-20">
            Use the quick home estimate tool to get an idea of what your new home might cost.
        </p>

        <hr>

        <div class="card mt-5">
            <div class="card-header">

                <form action="" method="post" class="validate tabs labels-right" id="quick_estimate_form">

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Finished Space</label>
                        <div class="col-sm-9">
                            <input type="text" name="finished" class="form-control" placeholder="sq ft, e.g. 2100" data-fv-notempty="true" data-fv-integer="true" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-sm-3">Unfinished Space</label>
                        <div class="col-sm-9">
                            <input type="text" name="unfinished" class="form-control" placeholder="sq ft, e.g. 1200">
                        </div>
                    </div>

                    <div class="form-group row mt-5 mb-2">
                        <div class="col-sm-9 ml-auto">
                            <button type="submit" class="btn btn-primary calculate"><i class="fa fa-check"></i> Calculate</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>

        <div class="results hide">

            @if (!empty($settings['last_update']['value']))
                <div class="alert alert-primary mt-3" role="alert">
                    Last calculator cost update was <strong>{{ $settings['last_update']['value'] }}</strong>. The calculator reflects numbers based on the last updated cost.
                </div>
            @endif

            <table class="table table-striped mt-5">
                <thead>
                <tr>
                    <td></td>
                    <td>Low Pricing</td>
                    <td></td>
                    <td>Mid Pricing</td>
                    <td></td>
                    <td>High Pricing</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Base Cost</td>
                    <td class="">{{ \Format::currency($settings['base_low']['value']) }}</td>
                    <td></td>
                    <td class="">{{ \Format::currency($settings['base_mid']['value']) }}</td>
                    <td></td>
                    <td class="">{{ \Format::currency($settings['base_high']['value']) }}</td>
                </tr>
                <tr>
                    <td>Finished Sq Ft <small class="finished-text text-muted"></small></td>
                    <td class="finished-low"></td>
                    <td></td>
                    <td class="finished-mid"></td>
                    <td></td>
                    <td class="finished-high"></td>
                </tr>
                <tr>
                    <td>Unfinished Sq Ft <small class="unfinished-text text-muted"></small></td>
                    <td class="unfinished-low"></td>
                    <td></td>
                    <td class="unfinished-mid"></td>
                    <td></td>
                    <td class="unfinished-high"></td>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <td class="total-low"></td>
                    <td></td>
                    <td class="total-mid"></td>
                    <td></td>
                    <td class="total-high"></td>
                </tr>
                </tbody>
            </table>

        </div>

        <p class="mt-3 font-14 text-muted">
            @if (!empty($settings['last_update']['value']))
            * Last calculator cost update was {{ $settings['last_update']['value'] }}.<br>
            @endif
            * Whether you fall within the low, mid or high pricing tier is determined by the grade and trim of options/features that you choose.
            <br>
            * This tool is meant to give a rough estimate only.  To receive an official estimate for your house, please contact us.
        </p>

    </div>


@endsection

@push('styles')

    <style>
        .total {
            font-weight: bold;
        }
    </style>

@endpush

@push('scripts')

    <script>

        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 2
        });

        var finishedLow = {{ $settings['finished_low']['value'] }};
        var finishedMid = {{ $settings['finished_mid']['value'] }};
        var finishedHigh = {{ $settings['finished_high']['value'] }};
        var unfinished = {{ $settings['unfinished']['value'] }};
        var baseLow = {{ $settings['base_low']['value'] }};
        var baseMid = {{ $settings['base_mid']['value'] }};
        var baseHigh = {{ $settings['base_high']['value'] }};


        $(window).on('quick_estimate_form.validationSuccess', function(e, obj) {
            obj.halt = true;
            $('.calculate').prop('disabled', false).removeClass('disabled');

            var finishedSqFt = $('input[name="finished"]').val() !== '' ? parseFloat($('input[name="finished"]').val()) : 0;
            var unfinishedSqFt = $('input[name="unfinished"]').val() !== '' ? parseFloat($('input[name="unfinished"]').val()) : 0;

            $('.finished-text').html('(' + finishedSqFt + ')');
            $('.unfinished-text').html('(' + unfinishedSqFt + ')');

            $('.finished-low').html(formatter.format(finishedSqFt * finishedLow));
            $('.finished-mid').html(formatter.format(finishedSqFt * finishedMid));
            $('.finished-high').html(formatter.format(finishedSqFt * finishedHigh));

            $('.unfinished-low').html(unfinishedSqFt > 0 ? formatter.format(unfinishedSqFt * unfinished) : '-');
            $('.unfinished-mid').html(unfinishedSqFt > 0 ? formatter.format(unfinishedSqFt * unfinished) : '-');
            $('.unfinished-high').html(unfinishedSqFt > 0 ? formatter.format(unfinishedSqFt * unfinished) : '-');

            $('.total-low').html(formatter.format(baseLow + (finishedSqFt * finishedLow) + (unfinishedSqFt * unfinished)));
            $('.total-mid').html(formatter.format(baseMid + (finishedSqFt * finishedMid) + (unfinishedSqFt * unfinished)));
            $('.total-high').html(formatter.format(baseHigh + (finishedSqFt * finishedHigh) + (unfinishedSqFt * unfinished)));

            $('.results').show();
        });

    </script>

@endpush