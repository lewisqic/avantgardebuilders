<?php

namespace App\Services;

use App\Models\Pin;
use Illuminate\Http\Request;

class PinService extends BaseService
{

    /**
     * @var null
     */
    protected $pin = null;


    /**
     * Load an existing pin record
     *
     * @param  array  $id
     * @return object
     */
    public function load($id)
    {
        $this->pin = Pin::findOrFail($id);
        return $this;
    }


    /**
     * create a new pin
     *
     * @param  array  $data
     * @return object
     */
    public function create($data)
    {
        // create pin and permissions
        $pin = Pin::create($data);
        return $pin;
    }


    /**
     * update a pin
     *
     * @param  array  $data
     * @return object
     */
    public function update($data)
    {

        // update pin
        $this->pin->fill($data)->save();

        return $this->pin;
    }

    /**
     * return array of user data for datatables
     * @return array
     */
    public function dataTables($data)
    {
        $pins = Pin::all();
        $pins_arr = [];
        foreach ( $pins as $pin ) {
            $pins_arr[] = [
                'id' => $pin->id,
                'class' => !is_null($pin->deleted_at) ? 'text-danger' : null,
                'label' => $pin->label,
                'address' => $pin->address,
                'year' => $pin->year,
                'created_at' => [
                    'display' => $pin->created_at->toFormattedDateString(),
                    'sort' => $pin->created_at->timestamp
                ],
                'action' => \Html::dataTablesActionButtons([
                    'edit' => 'admin/pins/' . $pin->id . '/edit',
                    'delete' => 'admin/pins/' . $pin->id,
                ])
            ];
        }
        return $pins_arr;
    }


}