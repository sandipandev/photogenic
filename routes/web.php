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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();
Route::group(['middleware'=>'OtpAuthentication'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/user_profile', 'UserProfileController@index')->name('user_profile');
    Route::post('/store_profile_picture', 'UserProfileController@store_profile_picture')->name('store_profile_picture');
    Route::get('/get_state', 'UserProfileController@get_state')->name('get_state');
    Route::get('/get_city', 'UserProfileController@get_city')->name('get_city');
    Route::post('/update_user_profile', 'UserProfileController@update_user_profile')->name('update_user_profile');
    Route::get('/archive', 'ArchiveController@index')->name('archive');
    Route::post('/store_archive_picture','ArchiveController@store_archive_picture')->name('store_archive_picture');
    Route::post('/delete_archive','ArchiveController@deleteArchive')->name('delete_archive');
    Route::get('/award', 'AwardController@index')->name('award');
    Route::get('/biodata', 'BiodataController@index')->name('biodata'); 
    Route::post('/biodata_store','BiodataController@store')->name('biodata_store');
    Route::get('/price_chart','PlanController@index')->name('price_chart');
    Route::get('/equipment','EquipmentController@index')->name('equipment');
    Route::post('update_equipment_profile','EquipmentController@store'); 
    Route::get('/purchase','PurchaseController@index')->name('purchase');  
    Route::post('/purchase_request','PurchaseController@createRequest')->name('purchase_request'); 
    Route::get('/contact_us','ContactUsController@index')->name('contact_us');  
    Route::post('/contact_us_process','ContactUsController@store')->name('contact_us_process'); 
    Route::get('/grievance','GrievanceController@index')->name('grievance');
    Route::post('/award_store','AwardController@storeAward')->name('award_store');
    Route::post('/delete_award','AwardController@deleteAward')->name('delete_award'); 
});
Route::post('/Verify', 'VerifyController@verify')->name('verify');
Route::get('verifyEmailFirst','Auth\RegisterController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('emailVerficationNeeded', 'emailVerficationNeededController@emailVerficationNeeded');
Route::get('/register','Auth\RegisterController@showAllClientEntity')->name('register');



Route::any('login/google', 'Auth\LoginController@redirectToProvider')->name('login/google');
Route::get('login/google/callback/{as?}', 'Auth\LoginController@handleProviderCallback');


