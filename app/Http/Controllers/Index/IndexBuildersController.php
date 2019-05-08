<?php
namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;

class IndexBuildersController extends Controller
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
     * Show our home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHome()
    {
        return view('content.index.builders.home');
    }


}