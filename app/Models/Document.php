<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends BaseModel
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
        'label', 'user_id', 'type', 'filename', 'path'
    ];

    /**
     * Declare rules for validation
     *
     * @var array
     */
    protected $rules = [
        'label'    => 'required',
        'type'     => 'required',
    ];


    /******************************************************************
     * MODEL RELATIONSHIPS
     ******************************************************************/

    // users
    public function user()
    {
    return $this->belongsTo('App\Models\User');
    }

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
