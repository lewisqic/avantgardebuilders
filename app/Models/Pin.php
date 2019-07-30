<?php

namespace App\Models;

class Pin extends BaseModel
{


    /******************************************************************
     * MODEL PROPERTIES
     ******************************************************************/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'label', 'year', 'address'
    ];

    /**
     * Declare rules for validation
     *
     * @var array
     */
    protected $rules = [
        'label'      => 'required',
        'year'      => 'required',
        'address'      => 'required',
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
