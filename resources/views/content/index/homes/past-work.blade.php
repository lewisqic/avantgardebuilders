@extends('layouts.homes')

@section('title', 'Past Work')

@section('content')

    <div class="page-heading homes-sub">
        <div class="container">

            <h1>
                <span>Past <span class="text-ag-light">Work</span></span>
            </h1>

        </div>
    </div>

    <div class="container content-wrapper">

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti deserunt distinctio fuga molestiae omnis perferendis quisquam vitae voluptas voluptatem? A aliquam aperiam asperiores dignissimos, ipsa odit placeat porro repellendus, repudiandae sunt tempore totam!
        </p>

        <hr>

        <div id="map"></div>
        <div id="legend"><h3>Legend</h3></div>

    </div>


@endsection


@push('styles')
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        #legend {
            font-family: Arial, sans-serif;
            background: #fff;
            padding: 10px;
            margin: 10px;
            border: 3px solid #000;
        }
        #legend h3 {
            margin-top: 0;
            font-size: 20px;
        }
        #legend img {
            vertical-align: middle;
        }
    </style>
@endpush
@push('scripts')
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: new google.maps.LatLng(39.482345, -111.496048),
                mapTypeId: 'roadmap'
            });

            var icons = {
                @foreach ($colors as $year => $color)
                {{ $year }}: {
                    name: '{{ $year }}',
                    icon: 'http://maps.google.com/mapfiles/ms/icons/{{ $color }}-dot.png'
                },
                @endforeach
            };

            var features = [
                @foreach ($pins as $pin)
                {
                    position: new google.maps.LatLng({{ $pin['lat'] }}, {{ $pin['lon'] }}),
                    label: '{{ $pin['label'] }}',
                    year: '{{ $pin['year'] }}',
                    color: '{{ $pin['color'] }}',
                },
                @endforeach
            ];

            // Create markers.
            features.forEach(function(feature) {
                var infowindow = new google.maps.InfoWindow({
                    content: feature.label
                });
                var marker = new google.maps.Marker({
                    position: feature.position,
                    icon: icons[feature.year].icon,
                    map: map,
                });
                marker.addListener('click', function() {
                    infowindow.open(map, marker);
                });
            });

            var legend = document.getElementById('legend');
            for (var key in icons) {
                var type = icons[key];
                var name = type.name;
                var icon = type.icon;
                var div = document.createElement('div');
                div.innerHTML = '<img src="' + icon + '" style="height: 28px;"> ' + name;
                legend.appendChild(div);
            }

            map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD08DBLEu4l_NdVlaaf9mD-Dobq4OL9U4U&callback=initMap"></script>
@endpush