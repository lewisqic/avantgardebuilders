<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Role;
use Facades\App\Services\UserService;
use Facades\App\Services\CompanyService;
use Facades\App\Services\CompanySubscriptionService;
use Facades\App\Services\CompanyPaymentMethodService;
use Facades\App\Services\CompanyPaymentService;
use App\Http\Controllers\Controller;

use net\authorize\api\contract\v1 as AnetAPI;


class AdminMemberController extends Controller
{

    /**
     * Show the members list page
     *
     * @return view
     */
    public function index()
    {
        return view('content.admin.members.index');
    }

    /**
     * Output our datatabalse json data
     *
     * @return json
     */
    public function dataTables()
    {
        $data = UserService::dataTables(\Request::all(), User::MEMBER_ID, null);
        return response()->json($data);
    }

    /**
     * Show the members create page
     *
     * @return view
     */
    public function create()
    {
        $data = [
            'title' => 'Add',
        ];
        return view('content.admin.members.create-edit', $data);
    }

    /**
     * Show the members create page
     *
     * @return view
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'title' => 'Edit',
            'user' => $user,
        ];
        return view('content.admin.members.create-edit', $data);
    }

    /**
     * Show an member
     *
     * @return view
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $data = [
            'user' => $user,
        ];
        return view('content.admin.members.show', $data);
    }

    /**
     * Create new member record
     *
     * @return redirect
     */
    public function store()
    {
        $data = \Request::all();
        $user_data = $data['user'];

        // create company
        $company = CompanyService::create([
            'name' => $user_data['first_name'] . ' ' . $user_data['last_name'],
            'email' => $user_data['email'],
        ]);
        $user_data['company_id'] = $company->id;
        $user_data['company_owner'] = true;

        // create the user
        $user_data['type'] = User::MEMBER_ID;
        $user = UserService::create($user_data);
        if ( isset($company) ) {
            $user->assignRole(Role::where('company_id', $company->id)->first());
        }

        \Msg::success($user->name . ' has been <strong>added</strong>');
        return redir('admin/members');
    }

    /**
     * Create new member record
     *
     * @return redirect
     */
    public function update()
    {
        $data = \Request::all();
        $user_data = $data['user'];

        // update user
        $user = UserService::load($user_data['id'])->update($user_data);

        \Msg::success($user->name . ' has been <strong>updated</strong>');
        return redir('admin/members');
    }

    /**
     * Delete an member record
     *
     * @return redirect
     */
    public function destroy($id)
    {
        $user = UserService::delete($id);
        \Msg::success($user->name . ' has been <strong>deleted</strong> ' . \Html::undoLink('admin/members/' . $user->id));
        return redir('admin/members');
    }

    /**
     * Restore an member record
     *
     * @return redirect
     */
    public function restore($id)
    {
        $user = UserService::restore($id);
        \Msg::success($user->name . ' has been <strong>restored</strong>');
        return redir('admin/members');
    }

    /**
     * Refund a payment
     * 
     * @return \redirect
     */
    public function refundPayment()
    {
        $result = CompanyPaymentService::refundPayment(\Request::input('id'));
        \Msg::success('Payment has been <strong>refunded</strong>');
        return redir('admin/members/' . \Request::input('user_id') . '#tab=show_payment_history');
    }


}
