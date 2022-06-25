<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/route-cache', function() {
    Artisan::call('route:clear');
    return 'Routes cache cleared';
 });
 

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Config cache cleared';
 });
 
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared';
 });
 
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache cleared';
 });

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/option/{id}', 'FrontendController@show_option')->name('show.option');
Route::get('/match-open/{id}', 'FrontendController@show_match_options')->name('show.match_options');

Route::post('/email-check', 'Auth\DataValidationController@userEmailCheck')->name('userEmailCheck');
Route::post('/username-check', 'Auth\DataValidationController@userUsernameCheck')->name('userUsernameCheck');

Auth::routes();

Route::prefix('auth')->middleware(['auth'])->group(function () {
    Route::post('/bet', 'User\BettingController@bet')->name('user.bet');
    Route::get('/', 'User\ProfileController@index')->name('home');
    Route::post('/gateway', 'User\DepositController@gatewayinfo')->name('gateway.info');
    Route::post('/deposit', 'User\DepositController@deposit')->name('user.storeDeposit');
    Route::post('/balance-transfer', 'User\BalanceTransferController@balanceTransfer')->name('user.balanceTransfer');
    Route::post('/withdraw', 'User\WithdrawController@withdraw')->name('user.storeWithdraw');
    Route::post('/change-profile', 'User\ProfileController@changeProfile')->name('change.profile');
    Route::post('/change-password', 'User\ProfileController@changePassword')->name('change.password');
    
    //Statement
    Route::get('/statement', 'User\ProfileController@statements')->name('user.statement');
    Route::get('/alart', 'User\ProfileController@alart')->name('user.alart');
    Route::post('/alart', 'User\ProfileController@updateAlart')->name('user.updateAlart');
    Route::get('/alart-count', 'User\ProfileController@alartCount')->name('user.alartCount');
    Route::post('/complain', 'User\ProfileController@submitComplain')->name('user.submitComplain');
});

Route::prefix('club')->middleware(['club'])->group(function () {
    Route::get('/', 'Club\ProfileController@index')->name('club.profile');
    Route::get('/statement', 'Club\ProfileController@statements')->name('club.statement');
    Route::post('/balance-transfer', 'Club\BalanceTransferController@balanceTransfer')->name('club.balanceTransfer');
    Route::post('/withdraw', 'Club\WithdrawController@withdraw')->name('club.storeWithdraw');
    Route::post('/change-profile', 'Club\ProfileController@changeProfile')->name('club.profileSetting');
    Route::post('/change-password', 'Club\ProfileController@changePassword')->name('club.changePassword');
});

Route::prefix('tib-admin')->middleware(['admin'])->group(function () {
require base_path('routes/admin.php');
});
