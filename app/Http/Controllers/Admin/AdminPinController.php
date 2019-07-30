<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pin;
use Facades\App\Services\PinService;
use App\Http\Controllers\Controller;


class AdminPinController extends Controller
{

    /**
     * Show the pins list page
     *
     * @return view
     */
    public function index()
    {
        return view('content.admin.pins.index');
    }

    /**
     * Output our datatabalse json data
     *
     * @return json
     */
    public function dataTables()
    {
        $data = PinService::dataTables(\Request::all());
        return response()->json($data);
    }

    /**
     * Show the pins create page
     *
     * @return view
     */
    public function create()
    {
        $data = [
            'title' => 'Add',
        ];
        return view('content.admin.pins.create-edit', $data);
    }

    /**
     * Show the pins create page
     *
     * @return view
     */
    public function edit($id)
    {
        $pin = Pin::findOrFail($id);
        $data = [
            'title' => 'Edit',
            'pin' => $pin,
        ];
        return view('content.admin.pins.create-edit', $data);
    }

    /**
     * Show an pin
     *
     * @return view
     */
    public function show($id)
    {
        $pin = Pin::findOrFail($id);
        $data = [
            'pin' => $pin,
        ];
        return view('content.admin.pins.show', $data);
    }

    /**
     * Create new pin record
     *
     * @return redirect
     */
    public function store()
    {
        // create the pin
        $pin = PinService::create(\Request::all());

        \Msg::success('Map pin has been <strong>added</strong>');
        return redir('admin/pins');
    }

    /**
     * Create new pin record
     *
     * @return redirect
     */
    public function update($id)
    {

        // update pin
        $pin = PinService::load($id)->update(\Request::all());

        \Msg::success('Map pin has been <strong>updated</strong>');
        return redir('admin/pins');
    }

    /**
     * Delete an pin record
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $pin = PinService::delete($id);
        \Msg::success('Map pin has been <strong>deleted</strong>');
        return redir('admin/pins');
    }


}
