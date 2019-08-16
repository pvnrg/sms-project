<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::post('sign-in', 'Auth\LoginController@loginA');

// Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
// Auth::routes();
// print_r(Auth::routes()); die;
Route::group(['middleware' => ['auth']], function () {
	Route::get('/','ProfileController@index');
	
	/*Route::get('/profile', 'ProfileController@index');
    Route::get('/profile/edit', 'ProfileController@edit');
    Route::patch('/profile/edit', 'ProfileController@update');
	
	Route::get('/profile/change-password', 'ProfileController@changePassword');
    Route::patch('/profile/change-password', 'ProfileController@updatePassword');*/
	
}); 

Route::group(['prefix' => 'admin','middleware' => ['auth', 'roles'],'roles' => 'SU'], function () {

    Route::get('roles/datatable', 'Admin\RolesController@datatable');
    Route::resource('/roles', 'Admin\RolesController');
});


Route::group(['prefix' => 'admin','middleware' => ['auth', 'roles'],'roles' => ['SU', 'CL'] ], function () {
	Route::get('/', 'Admin\AdminController@index');
	
	
	
	Route::get('/users/search', 'Admin\UsersController@search');
    Route::get('/users/datatable', 'Admin\UsersController@userDatatable');
    Route::resource('/users', 'Admin\UsersController');

    Route::get('/fee_schedules/search', 'Admin\FeeSchedulesController@search');
    Route::get('/fee_schedules/datatable', 'Admin\FeeSchedulesController@classDatatable');
    Route::resource('/fee_schedules', 'Admin\FeeSchedulesController');

    Route::get('/sec_ids/search', 'Admin\SecIdsController@search');
    Route::get('/sec_ids/datatable', 'Admin\SecIdsController@classDatatable');
    Route::resource('/sec_ids', 'Admin\SecIdsController');

    Route::get('/transaction_types/search', 'Admin\TransactionTypesController@search');
    Route::get('/transaction_types/datatable', 'Admin\TransactionTypesController@classDatatable');
    Route::resource('/transaction_types', 'Admin\TransactionTypesController');

    Route::get('/client_classes/search', 'Admin\ClientClassesController@search');
    Route::get('/client_classes/datatable', 'Admin\ClientClassesController@classDatatable');
    Route::resource('/client_classes', 'Admin\ClientClassesController');

    Route::get('/transactions/search', 'Admin\TransactionsController@search');
    Route::get('/transactions/datatable', 'Admin\TransactionsController@classDatatable');
    Route::resource('/transactions', 'Admin\TransactionsController');

    //====================================================================//


    Route::get('/blogs/search', 'Admin\BlogController@search');
    Route::get('/blogs/datatable', 'Admin\BlogController@blogDatatable');
    Route::resource('/blogs', 'Admin\BlogController');
	
	Route::get('/gallery-category/search', 'Admin\GalleryCategoryController@search');
    Route::get('/gallery-category/datatable', 'Admin\GalleryCategoryController@galleryCategoryDatatable');
    Route::resource('/gallery-category', 'Admin\GalleryCategoryController');

	Route::get('/gallery/search', 'Admin\GalleryController@search');
    Route::get('/gallery/datatable', 'Admin\GalleryController@galleryDatatable');
    Route::resource('/gallery', 'Admin\GalleryController');

    Route::get('/coach/search', 'Admin\CoachController@search');
    Route::get('/coach/datatable', 'Admin\CoachController@coachDatatable');
    Route::resource('/coach', 'Admin\CoachController');

	Route::resource('permissions', 'Admin\PermissionsController');
	
	
	Route::get('/profile', 'Admin\ProfileController@index')->name('profile.index');
    Route::get('/profile/edit', 'Admin\ProfileController@edit')->name('profile.edit');
    Route::patch('/profile/edit', 'Admin\ProfileController@update');
        //
    Route::get('/profile/change-password', 'Admin\ProfileController@changePassword')->name('profile.password');
    Route::patch('/profile/change-password', 'Admin\ProfileController@updatePassword');
	
	
});  




