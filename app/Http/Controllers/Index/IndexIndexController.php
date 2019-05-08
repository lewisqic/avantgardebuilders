<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexIndexController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show our landing page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLanding()
    {
        return view('content.index.index.landing');
    }


}