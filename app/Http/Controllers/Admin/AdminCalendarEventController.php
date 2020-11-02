<?php

namespace App\Http\Controllers\Admin;

use App\Models\CalendarEvent;
use Facades\App\Services\CalendarEventService;
use App\Http\Controllers\Controller;


class AdminCalendarEventController extends Controller
{

	/**
	 * Show the calendar list page
	 *
	 * @return view
	 */
	public function index()
	{
		return view('content.admin.calendar.index');
	}

	/**
	 * Output our datatabalse json data
	 *
	 * @return json
	 */
	public function dataTables()
	{
		$data = CalendarEventService::dataTables(\Request::all());
		return response()->json($data);
	}

	/**
	 * Show the calendar create page
	 *
	 * @return view
	 */
	public function create()
	{
		$data = [
			'title' => 'Add',
		];
		return view('content.admin.calendar.create-edit', $data);
	}

	/**
	 * Show the calendar create page
	 *
	 * @return view
	 */
	public function edit($id)
	{
		$event = CalendarEvent::findOrFail($id);
		$data = [
			'title' => 'Edit',
			'event' => $event,
		];
		return view('content.admin.calendar.create-edit', $data);
	}

	/**
	 * Show an event
	 *
	 * @return view
	 */
	public function show($id)
	{
		$event = CalendarEvent::findOrFail($id);
		$data = [
			'event' => $event,
		];
		return view('content.admin.calendar.show', $data);
	}

	/**
	 * Create new event record
	 *
	 * @return redirect
	 */
	public function store()
	{
		// create the event
		$event = CalendarEventService::create(\Request::all());

		\Msg::success('Calendar event has been <strong>added</strong>');
		return redir('admin/calendar');
	}

	/**
	 * Create new event record
	 *
	 * @return redirect
	 */
	public function update($id)
	{

		// update event
		$event = CalendarEventService::load($id)->update(\Request::all());

		\Msg::success('Calendar event has been <strong>updated</strong>');
		return redir('admin/calendar');
	}

	/**
	 * Delete an event record
	 *
	 * @return redirect
	 */
	public function destroy($id)
	{
		$event = CalendarEventService::delete($id);
		\Msg::success('Calendar event has been <strong>deleted</strong>');
		return redir('admin/calendar');
	}


}
