<?php

namespace App\Services;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;

class CalendarEventService extends BaseService
{

	/**
	 * @var null
	 */
	protected $event = null;


	/**
	 * Load an existing event record
	 *
	 * @param  array  $id
	 * @return object
	 */
	public function load($id)
	{
		$this->event = CalendarEvent::findOrFail($id);
		return $this;
	}


	/**
	 * create a new event
	 *
	 * @param  array  $data
	 * @return object
	 */
	public function create($data)
	{
		$data['is_active'] = isset($data['is_active']);
		$data['start_at'] = date('Y-m-d', strtotime($data['start_at']));
		$data['end_at'] = date('Y-m-d', strtotime($data['end_at']));

		// create event and permissions
		$event = CalendarEvent::create($data);
		return $event;
	}


	/**
	 * update a event
	 *
	 * @param  array  $data
	 * @return object
	 */
	public function update($data)
	{
		$data['is_active'] = isset($data['is_active']);
		$data['start_at'] = date('Y-m-d', strtotime($data['start_at']));
		$data['end_at'] = date('Y-m-d', strtotime($data['end_at']));

		// update event
		$this->event->fill($data)->save();

		return $this->event;
	}

	/**
	 * return array of user data for datatables
	 * @return array
	 */
	public function dataTables($data)
	{
		$events = CalendarEvent::all();
		$events_arr = [];
		foreach ( $events as $event ) {
			$events_arr[] = [
				'id' => $event->id,
				'class' => !is_null($event->deleted_at) ? 'text-danger' : null,
				'title' => $event->title,
				'description' => mb_strimwidth($event->description, 0, 50, '...'),
				'is_active' => $event->is_active ? 'Yes' : 'No',
				'start_at' => [
					'display' => $event->start_at->toFormattedDateString(),
					'sort' => $event->start_at->timestamp
				],
				'end_at' => [
					'display' => $event->end_at->toFormattedDateString(),
					'sort' => $event->end_at->timestamp
				],
				'created_at' => [
					'display' => $event->created_at->toFormattedDateString(),
					'sort' => $event->created_at->timestamp
				],
				'action' => \Html::dataTablesActionButtons([
					'edit' => 'admin/calendar/' . $event->id . '/edit',
					'delete' => 'admin/calendar/' . $event->id,
					'restore' => !is_null($event->deleted_at) ? 'admin/calendar/' . $event->id : null,
				])
			];
		}
		return $events_arr;
	}


}