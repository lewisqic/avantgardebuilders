@extends('layouts.homes')

@section('title', 'Calendar')

@section('content')

	<div class="page-heading homes-sub">
		<div class="container">

			<h1>
				<span>Project <span class="text-ag-light">Calendar</span></span>
			</h1>

		</div>
	</div>

	<div class="container content-wrapper">

		<ul class="nav nav-tabs hash-tabs page-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#owners" role="tab">Home Owners</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#contractors" role="tab">Contractors</a>
			</li>
		</ul>

		<div class="tab-content page-tabs-content">
			<div class="tab-pane fade show active" id="owners" role="tabpanel">

				<div class="row">
					<div class="col-sm-8">
						<div id="calendar"></div>
					</div>
					<div class="col-sm-4">
						<div class="qualifications-wrapper">
							<h4>List of Qualifications:</h4>
							@if (!empty($settings['qualifications']['value']))
								<p class="text-muted">To get on the schedule, you must meet the qualifications listed below.</p>
								{!! nl2br($settings['qualifications']['value']) !!}
							@else
								<em>none</em>
							@endif
						</div>
					</div>
				</div>

				<hr class="my-5">

				<div class="row">
					<div class="col-sm-6">
						<h4>Project Plans in Progress:</h4>
						@if (!empty($settings['plans_in_progress']['value']))
							{!! nl2br($settings['plans_in_progress']['value']) !!}
						@else
							<em>none</em>
						@endif
					</div>
					<div class="col-sm-6">
						<h4>Project Estimates in Progress:</h4>
						@if (!empty($settings['estimates_in_progress']['value']))
							{!! nl2br($settings['estimates_in_progress']['value']) !!}
						@else
							<em>none</em>
						@endif
					</div>
				</div>

			</div>
			<div class="tab-pane fade" id="contractors" role="tabpanel">

				@if ($documents->isEmpty())
					<div class="text-center text-muted">
						<em>No documents found</em>
					</div>
				@endif

				@foreach ($documents as $document)
					<div>
						<strong>{{ $document->label }}</strong> ({{ $document->filename }}) <a href="{{ url('homes/calendar/download/' . $document->id) }}"><i class="fal fa-download ml-3"></i> Download</a>
					</div>
					<hr>
				@endforeach

			</div>
		</div>

	</div>


@endsection

@push('styles')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.css">
	<style>
		.qualifications-wrapper {
            margin-top: 60px;
		}
        .fc .fc-button-primary {
            background-color: #1e6c76;
            border-color: #1e6c76;
        }
        .fc-h-event {
            border: 1px solid #A59E8C;
            background-color: #A59E8C;
            font-size: 12px;
        }
        .fc-h-event:hover {
			cursor: pointer;
		}
		.event-description {
			position: absolute;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.8);
			overflow: hidden;
			color: #fff;
            font-size: 14px;
			padding: 5px 15px;
			border-radius: 4px;
		}
	</style>
@endpush
@push('scripts')
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				initialView: 'dayGridMonth',
				height: 'auto',
				eventMouseEnter: function(mouseEnterInfo) {
					let description = mouseEnterInfo.event.extendedProps.description;
					let top = parseFloat(mouseEnterInfo.jsEvent.pageY) + 10;
					let left = mouseEnterInfo.jsEvent.pageX;
					if (description) {
						$('body').append('<div class="event-description" style="top: ' + top + 'px; left: ' + left + 'px;">' + mouseEnterInfo.event.title + '<br>' + description + '</div>');
					}
				},
				eventMouseLeave: function(mouseEnterInfo) {
					$('.event-description').remove();
				},
				events: [
					@foreach ($events as $event)
					{
						title: '{{ strtoupper($event['title']) }} ({{ date('M jS, Y', strtotime($event['start_at'])) }} - {{ date('M jS, Y', strtotime($event['end_at'])) }})',
						description: '{{ $event['description'] }}',
						start: '{{ $event['start_at'] }}',
						end: '{{ $event['end_at'] }}',
					},
					@endforeach
				]
			});
			calendar.render();
		});

	</script>
@endpush