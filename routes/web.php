<?php

use App\Http\Controllers\TravelController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [TravelController::class, 'index'])->name('travels.index');

Route::get('/planIndex', [TravelController::class, 'planIndex'])->name('travels.planIndex');

Route::get('/planMake', [TravelController::class, 'planMake'])->name('travels.planMake');
Route::post('/planMake_submit', [TravelController::class, 'planMake_submit'])->name('travels.planMake_submit');
Route::get('/planConfirm', [TravelController::class, 'planConfirm'])->name('travels.planConfirm');
Route::post('/planConfirm_submit', [TravelController::class, 'planConfirm_submit'])->name('travels.planConfirm_submit');
Route::get('/planComplete', [TravelController::class, 'planComplete'])->name('travels.planComplete');

Route::get('/diaryIndex', [TravelController::class, 'diaryIndex'])->name('travels.diaryIndex');
Route::get('/diaryDetail/{id}', [TravelController::class, 'diaryDetail'])->name('travels.diaryDetail');
Route::get('/diaryMake', [TravelController::class, 'diaryMake'])->name('travels.diaryMake');
Route::post('/diaryMake_submit', [TravelController::class, 'diaryMake_submit'])->name('travels.diaryMake_submit');
Route::get('/diaryConfirm', [TravelController::class, 'diaryConfirm'])->name('travels.diaryConfirm');
Route::post('/diaryConfirm_submit', [TravelController::class, 'diaryConfirm_submit'])->name('travels.diaryConfirm_submit');
Route::get('/diaryComplete', [TravelController::class, 'diaryComplete'])->name('travels.diaryComplete');

Route::get('/', [LoginController::class, 'login'])->name('logins.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/userLogin', [LoginController::class, 'userLogin'])->name('logins.userLogin');
Route::get('/register', [LoginController::class, 'register'])->name('logins.register');
Route::post('/userRegister', [LoginController::class, 'userRegister'])->name('logins.userRegister');
Route::get('/register_comp', [LoginController::class, 'register_comp'])->name('logins.register_comp');

Route::get('/adminIndex', [TravelController::class, 'adminIndex'])->name('admins.adminIndex');
Route::get('/adminUserlist', [TravelController::class, 'adminUserlist'])->name('admins.adminUserlist');

Route::get('/user_delete/{id}', [TravelController::class, 'user_delete'])->name('admins.delete');
Route::get('/plan_delete/{id}', [TravelController::class, 'plan_delete'])->name('admins.delete');

Route::get('/prefecture/{name}', [TravelController::class, 'showPlans'])->name('travels.plan_page');
Route::get('/plans/{name}', [TravelController::class, 'showPlans'])->name('showPlans');