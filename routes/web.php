<?php


/**
 * Auth route group
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    // GET
    Route::get('/', function() { return redirect('auth/login'); });
    Route::get('login', ['uses' => 'AuthIndexController@showLogin']);
    Route::get('forgot', ['uses' => 'AuthIndexController@showForgot']);
    Route::get('reset/{token}', ['uses' => 'AuthIndexController@showReset'])->name('password.reset');
    // POST
    Route::post('login', ['uses' => 'AuthIndexController@handleLogin']);
    Route::post('forgot', ['uses' => 'AuthIndexController@handleForgot']);
    Route::post('reset', ['uses' => 'AuthIndexController@handleReset']);
});
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('logout', ['uses' => 'AuthIndexController@handleLogout']);
});


/**
 * Admin route group
 */
Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin'], 'namespace' => 'Admin'], function() {

    // GET
    Route::get('/', function() { return redirect('admin/documents'); });
    Route::get('data', ['uses' => 'AdminIndexController@data']);
    Route::post('save-configurator', 'AdminIndexController@saveConfigurator');
    Route::post('save-favorite', 'AdminIndexController@saveFavorite');
    Route::post('delete-favorite', 'AdminIndexController@deleteFavorite');
    Route::get('search', 'AdminSearchController@showResults');

    // profile
    Route::get('profile', ['uses' => 'AdminProfileController@index']);
    Route::put('profile', ['uses' => 'AdminProfileController@update']);

    // pins
    Route::get('documents/{id}/download', ['uses' => 'AdminDocumentController@download'])->name('admin.documents.download');
    Route::patch('documents/{id}', ['uses' => 'AdminDocumentController@restore'])->name('admin.documents.restore');
    Route::get('documents/data', ['uses' => 'AdminDocumentController@dataTables']);
    Route::resource('documents', 'AdminDocumentController', ['as' => 'admin']);

    // members
    Route::get('members/data', ['uses' => 'AdminMemberController@dataTables']);
    Route::patch('members/{id}', ['uses' => 'AdminMemberController@restore'])->name('admin.members.restore');
    Route::post('members/refund-payment', ['uses' => 'AdminMemberController@refundPayment']);
    Route::resource('members', 'AdminMemberController', ['as' => 'admin']);

    // pins
    Route::get('pins/data', ['uses' => 'AdminPinController@dataTables']);
    Route::resource('pins', 'AdminPinController', ['as' => 'admin']);

    // member roles
    //Route::get('member-roles/data', ['uses' => 'AdminMemberRoleController@dataTables']);
    //Route::patch('member-roles/{id}', ['uses' => 'AdminMemberRoleController@restore'])->name('admin.member-roles.restore');
    //Route::resource('member-roles', 'AdminMemberRoleController', ['as' => 'admin']);

    // administrators
    Route::get('administrators/data', ['uses' => 'AdminAdministratorController@dataTables']);
    Route::patch('administrators/{id}', ['uses' => 'AdminAdministratorController@restore'])->name('admin.administrators.restore');
    Route::resource('administrators', 'AdminAdministratorController', ['as' => 'admin']);

    // administrator roles
    Route::get('administrator-roles/data', ['uses' => 'AdminAdministratorRoleController@dataTables']);
    Route::patch('administrator-roles/{id}', ['uses' => 'AdminAdministratorRoleController@restore'])->name('admin.administrator-roles.restore');
    Route::resource('administrator-roles', 'AdminAdministratorRoleController', ['as' => 'admin']);

    // settings
    Route::get('settings', ['uses' => 'AdminSettingController@index'])->name('admin.settings.index');
    Route::post('settings', ['uses' => 'AdminSettingController@update'])->name('admin.settings.update');

    // activity log
    Route::get('activity/data', ['uses' => 'AdminActivityController@dataTables']);
    Route::resource('activity', 'AdminActivityController', ['as' => 'admin']);

});


/**
 * Account route group
 */
Route::group(['prefix' => 'account', 'middleware' => ['auth:account'], 'namespace' => 'Account'], function() {

    // GET
    Route::get('/', function() { return redirect('account/documents'); });
    Route::get('documents', ['uses' => 'AccountIndexController@showDocuments']);
    Route::get('documents/download/{id}', ['uses' => 'AccountIndexController@downloadDocument']);
    Route::post('help', ['uses' => 'AccountIndexController@handleHelp']);
    Route::post('save-configurator', 'AccountIndexController@saveConfigurator');

    // profile
    Route::get('profile', ['uses' => 'AccountProfileController@index']);
    Route::put('profile', ['uses' => 'AccountProfileController@update']);

    // users
    Route::get('users/data', ['uses' => 'AccountUserController@dataTables']);
    Route::patch('users/{id}', ['uses' => 'AccountUserController@restore'])->name('account.users.restore');
    Route::resource('users', 'AccountUserController', ['as' => 'account']);

    // user roles
    Route::get('roles/data', ['uses' => 'AccountRoleController@dataTables']);
    Route::patch('roles/{id}', ['uses' => 'AccountRoleController@restore'])->name('account.roles.restore');
    Route::resource('roles', 'AccountRoleController', ['as' => 'account']);

    // settings
    Route::get('settings', ['uses' => 'AccountSettingController@index'])->name('account.settings.index');
    Route::post('settings', ['uses' => 'AccountSettingController@update'])->name('account.settings.update');

});


Route::group(['middleware' => ['guest'], 'namespace' => 'Index'], function () {

    /**
     * Landing
     */
    Route::get('/', ['uses' => 'IndexIndexController@showLanding']);

    /**
     * Homes
     */
    Route::get('homes', ['uses' => 'IndexHomesController@showHome']);
    Route::get('homes/what-we-do', ['uses' => 'IndexHomesController@showWhatWeDo']);
    Route::get('homes/past-work', ['uses' => 'IndexHomesController@showPastWork']);
    Route::get('homes/our-partners', ['uses' => 'IndexHomesController@showOurPartners']);
    Route::get('homes/about-us', ['uses' => 'IndexHomesController@showAboutUs']);
    Route::get('homes/contact', ['uses' => 'IndexHomesController@showContact']);
    Route::post('homes/contact', ['uses' => 'IndexHomesController@handleContact']);

    Route::get('homes/quick-estimate', ['uses' => 'IndexHomesController@showQuickEstimate']);
    Route::get('homes/documents', ['uses' => 'IndexHomesController@showDocuments']);

    /**
     * Builders
     */
    Route::get('builders', ['uses' => 'IndexBuildersController@showHome']);

});