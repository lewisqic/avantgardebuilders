<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class CalendarEvent extends BaseModel
{
	use SoftDeletes;


	/******************************************************************
	 * MODEL PROPERTIES
	 ******************************************************************/

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title', 'description', 'is_active', 'start_at', 'end_at'
	];

	/**
	 * Declare rules for validation
	 *
	 * @var array
	 */
	protected $rules = [
		'title'    => 'required',
		'start_at' => 'required',
	];


	/******************************************************************
	 * MODEL RELATIONSHIPS
	 ******************************************************************/


	/******************************************************************
	 * MODEL HOOKS
	 ******************************************************************/


	/******************************************************************
	 * CUSTOM  PROPERTIES
	 ******************************************************************/


	/******************************************************************
	 * CUSTOM ORM ACTIONS
	 ******************************************************************/


}
