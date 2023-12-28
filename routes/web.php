<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [TravelController::class, 'index'])->name('travels.index');

Route::get('/planIndex', [TravelController::class, 'planIndex'])->name('travels.planIndex');

Route::get('/planMake', [TravelController::class, 'planMake'])->name('travels.planMake');
Route::post('/planMake_submit', [TravelController::class, 'planMake_submit'])->name('travels.planMake_submit');
Route::get('/planConfirm', [TravelController::class, 'planConfirm'])->name('travels.planConfirm');
Route::post('/planConfirm_submit', [TravelController::class, 'planConfirm_submit'])->name('travels.planConfirm_submit');
Route::get('/planComplete', [TravelController::class, 'planComplete'])->name('travels.planComplete');

Route::get('/diaryIndex', [DiaryController::class, 'diaryIndex'])->name('diaries.diaryIndex');
Route::get('/diaryDetail/{id}', [DiaryController::class, 'diaryDetail'])->name('diaries.diaryDetail');
Route::get('/diaryMake', [DiaryController::class, 'diaryMake'])->name('diaries.diaryMake');
Route::post('/diaryMake_submit', [DiaryController::class, 'diaryMake_submit'])->name('diaries.diaryMake_submit');
Route::get('/diaryConfirm', [DiaryController::class, 'diaryConfirm'])->name('diaries.diaryConfirm');
Route::post('/diaryConfirm_submit', [DiaryController::class, 'diaryConfirm_submit'])->name('diaries.diaryConfirm_submit');
Route::get('/diaryComplete', [DiaryController::class, 'diaryComplete'])->name('diaries.diaryComplete');

Route::get('/', [LoginController::class, 'login'])->name('logins.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/userLogin', [LoginController::class, 'userLogin'])->name('logins.userLogin');
Route::get('/register', [LoginController::class, 'register'])->name('logins.register');
Route::post('/userRegister', [LoginController::class, 'userRegister'])->name('logins.userRegister');
Route::get('/register_comp', [LoginController::class, 'register_comp'])->name('logins.register_comp');
Route::get('/register_ad', [LoginController::class, 'register_ad'])->name('admins.register_ad');
Route::post('/register_ad', [LoginController::class, 'userRegister'])->name('admins.userRegisterAd');

Route::get('/adminIndex', [TravelController::class, 'adminIndex'])->name('admins.adminIndex');
Route::get('/adminUserlist', [TravelController::class, 'adminUserlist'])->name('admins.adminUserlist');

Route::get('/user_delete/{id}', [TravelController::class, 'user_delete'])->name('admins.delete');
Route::get('/plan_delete/{id}', [TravelController::class, 'plan_delete'])->name('admins.delete');

Route::get('/prefecture/{name}', [TravelController::class, 'showPlans'])->name('travels.plan_page');
Route::get('/plans/{name}', [TravelController::class, 'showPlans'])->name('showPlans');

Route::get('/ToNewComer', [ExtraController::class, 'ToNewComer'])->name('extras.ToNewComer');
Route::get('/board', [ExtraController::class, 'board'])->name('extras.board');
Route::post('/board', [ExtraController::class, 'store']);
Route::post('/reply-to-post/{post}', [ExtraController::class, 'reply']);

Route::get('/FAQ', [ExtraController::class, 'FAQ'])->name('extras.FAQ');
Route::get('/siteInfo', [ExtraController::class,'siteInfo'])->name('extras.siteInfo');
Route::get('/contact', [ExtraController::class, 'contact'])->name('extras.contact');
Route::post('/contactForm', [ExtraController::class, 'contactForm']);
Route::get('/confirm', [ExtraController::class, 'confirm'])->name('extras.confirm');
Route::post('/confirmForm', [ExtraController::class, 'confirmForm']);
Route::get('/complete', [ExtraController::class, 'complete'])->name('extras.complete');
Route::get('/userAgreement', [ExtraController::class, 'userAgreement'])->name('extras.userAgreement');
Route::get('/privacyPolicy', [ExtraController::class, 'privacyPolicy'])->name('extras.privacyPolicy');
Route::get('/sitemap', [ExtraController::class, 'sitemap'])->name('extras.sitemap');

Route::get('/sticky', [ExtraController::class, 'sticky'])->name('extras.sticky');

Route::post('/comment/store', [CommentController::class, 'storeComment'])->name('comment.store');
Route::delete('/comment/{id}', [CommentController::class, 'deleteComment'])->name('comment.delete');

Route::get('/favorite/{plan_id}',[LikeController::class,'index']);
Route::post('/favorite/{plan_id}',[LikeController::class,'like']);

Route::get('/information/user/{user_id}',[UserController::class,'userinfo'])->name('users.userInfo');
