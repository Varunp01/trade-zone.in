<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\backend\CustomloginController;
use App\Http\Controllers\backend\AdminController;

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
    return view('frontend.index_again');
});
Route::get('contact',[FrontController::class, 'contact'])->name('contact');
Route::get('terms-conditions',[FrontController::class, 'termCondition'])->name('terms');
Route::Match(['get','post'],'register',[FrontController::class, 'register'])->name('register');
Route::Match(['get','post'],'login',[FrontController::class, 'login'])->name('login');
Route::get('daily-roi',[UserController::class, 'dailyRoi'])->name('daily.roi');
Route::middleware(['CustomAuth'])->group(function () {
    Route::get('user/dashboard',[UserController::class, 'userDashboard'])->name('user.dashboard');
    Route::get('user/status',[UserController::class, 'userStatus'])->name('user.status');
    Route::get('user/view-referal',[UserController::class, 'viewReferal'])->name('view.referal');
    Route::get('user/view-withdraw',[UserController::class, 'viewWithdraw'])->name('view.withdraw');
    Route::Match(['get','post'],'user/withdraw-request',[UserController::class, 'withdrawRequest'])->name('withdraw.request');
    Route::Match(['get','post'],'user/add-payment',[UserController::class, 'addPayment'])->name('add.payment');
    Route::get('user/view-payment',[UserController::class, 'viewPayment'])->name('view.payment.status');
    Route::get('user/view-roy',[UserController::class, 'viewRoy'])->name('view.roy');
    Route::any('user/complete-kyc',[UserController::class, 'completeKyc'])->name('user.kyc');
    Route::any('user/view-profile',[UserController::class, 'viewProfile'])->name('user.profile');
    Route::any('user/team',[UserController::class, 'directTeam'])->name('user.team.direct');
    Route::any('user/team/{referal_code}/{level}',[UserController::class, 'levelTeam'])->name('user.team.level');
    Route::get('user/logout',[UserController::class, 'userLogout'])->name('user.logout');
});

// Admin Route


Route::get('/admin',[CustomloginController::class,'index'])->name('admin');
Route::post('/admin-login',[CustomloginController::class,'login'])->name('admin.login');
Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('/admin/view-user',[AdminController::class,'viewUser'])->name('admin.view.user');
Route::get('/admin/view-user-inactive',[AdminController::class,'viewUserInactive'])->name('admin.view.user.inactive');
Route::get('/admin/user-detail/{id}',[AdminController::class,'viewUserDetail'])->name('admin.user.detail');
Route::get('/admin/view-withdraw-request/{status}',[AdminController::class,'viewwithdrawRequest'])->name('admin.view.withdraw');
Route::get('/admin/approve-cancel-withdraw/{id}/{status}',[AdminController::class,'approveCancel'])->name('admin.approve');
Route::get('/admin/view-payment-request/{status}',[AdminController::class,'viewPaymentRequest'])->name('admin.view.payment');
Route::get('/admin/approve-cancel-payment/{id}/{status}',[AdminController::class,'approveCancelPayment'])->name('admin.approve.payment');
Route::get('/admin/active-inactive/{id}/{status}',[AdminController::class,'activeInactive']);
Route::post('/admin/change-password',[AdminController::class,'changePassword'])->name('change.password');
Route::post('/admin/update-roi',[AdminController::class,'updateRoi'])->name('add.roi');
Route::Match(['get','post'],'admin/add-investor',[AdminController::class, 'addInvestor'])->name('admin.add.investor');
Route::get('/admin/view-investor',[AdminController::class,'viewInvestor'])->name('admin.view.investor');
Route::Match(['get','post'],'admin/add-fix-deposit',[AdminController::class, 'addInvestorFix'])->name('admin.add.fix');
Route::get('/admin/view-fix-deposit',[AdminController::class,'viewInvestorFix'])->name('admin.view.fix');
Route::Match(['get','post'],'admin/add-mdgroup',[AdminController::class, 'addMdgroup'])->name('admin.add.mdgroup');
Route::get('/admin/view-mdgroup',[AdminController::class,'viewMdGroup'])->name('admin.view.mdgroup');

Route::get('/admin/logout',[AdminController::class,'logout'])->name('logout');