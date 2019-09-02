<?php

namespace App\Http\Controllers\Account;

use App\Models\User;
use Facades\App\Services\UserService;
use App\Http\Controllers\Controller;

class AccountProfileController extends Controller {

    /**
     * show our edit profile form page
     * @return view
     */
    public function index()
    {
        // TODO: implement profile image feature
        $data = [];
        return view('content.account.profile.index', $data);
    }

    /**
     * handle our update profile request
     * @return redirect
     */
    public function update()
    {
        $user = UserService::load(\Auth::user()->id)->update(\Request::all());
        \Msg::success('Your profile has been <strong>updated</strong>');
        return redir('account/profile');
    }

}
