<?php

namespace App\Services;

use App\Models\User;
use App\Models\Company;
use App\Models\Permission;
use Facades\App\Services\RoleService;
use Facades\App\Services\CompanyPaymentMethodService;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class CompanyService extends BaseService
{


    /**
     * @var null
     */
    protected $company = null;


    /**
     * Load an existing company record
     *
     * @param  array $id
     *
     * @return object
     */
    public function load($id)
    {
        $this->company = Company::findOrFail($id);
        return $this;
    }


    /**
     * create a new company record
     *
     * @param  array $data
     *
     * @return array
     */
    public function create($data)
    {
        // create company
        $company = Company::create($data);

        // create default role
        $role = RoleService::create([
            'company_id' => $company->id,
            'name'       => 'Default',
            'guard_name' => User::$types[User::MEMBER_ID]['route'] . '-' . $company->id,
            'is_default' => true,
        ]);

        // assign all permissions to role
        $role->givePermissionTo(Permission::where('guard_name', 'account')->get());

        return $company;
    }


    /**
     * update a company record
     *
     * @param  array $data
     *
     * @return object
     */
    public function update($data, $payment_data = [])
    {
        // update company
        $this->company->fill($data)->save();
        return $this->company;
    }


}