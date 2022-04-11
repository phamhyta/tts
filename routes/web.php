<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\AdminRegisterController;
use App\Http\Controllers\user\UserLoginController;
use App\Http\Controllers\user\UserRegisterController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminLogoutController;
use App\Http\Controllers\user\UserLogoutController;
use App\Http\Controllers\user\CreateController;
use App\Http\Controllers\admin\AdminEditController;
use App\Http\Controllers\user\InforController;
use App\Http\Controllers\user\MyNewsController;
use App\Http\Controllers\user\ForgetPassController;
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

//========================FE=================================
Route::get('/', [
    NewsController::class, 'index'
])->name('home');
//search
Route::post('/', [
    NewsController::class, 'search'
])->name('client.search');


Route::prefix('client')->group(function() {
    //login
    Route::get('/login', [
        UserLoginController::class, 'index'
    ])->name('client.login.index');
    Route::post('/login', [
        UserLoginController::class, 'store'
    ])->name('client.login.store');
    //logout
    Route::get('/logout', [
        UserLogoutController::class, 'logout'
    ])->name('client.logout');
    Route::post('/logout', [
        UserLogoutController::class, 'logout'
    ])->name('client.logout');
    //register
    Route::get('/register', [
        UserRegisterController::class, 'rindex'
    ])->name('client.register.index');
    Route::post('/register', [
        UserRegisterController::class, 'rstore'
    ])->name('client.register.store');
    
    //change-info
    Route::get('/info', [
        InforController::class, 'index'
    ])->name('client.info.index');

    Route::get('/change-info', [
        InforController::class, 'change'
    ])->name('client.change-info.index');

    Route::post('/change-info', [
        InforController::class, 'update'
    ])->name('client.change-info.update');

    //create_new
    Route::get('/create', [
        CreateController::class, 'index'
    ])->name('client.create.index');
    Route::post('/create', [
        CreateController::class, 'store'
    ])->name('client.create.store');
    
    //edit_news
    Route::get('/del/{id}', [
        MyNewsController::class, 'delete'
    ])->name('client.news.del');

    Route::get('/edit/{id}', [
        MyNewsController::class, 'edit'
    ])->name('client.news.edit');
    Route::post('/edit/{id}', [
        MyNewsController::class, 'update'
    ])->name('client.news.store');
    
    //tin-da-dang
    Route::get('/newlist', [
        MyNewsController::class, 'index'
    ])->name('client.newlist');
    Route::post('/newlist', [
        MyNewsController::class, 'search'
    ])->name('client.create.search');
});

//forget pass
Route::get('/forgetpassword', [
    ForgetPassController::class, 'forgetPass'
])->name('account.password.forget');
Route::post('/forgetpassword', [
    ForgetPassController::class, 'forgetPassStore'
])->name('account.password.forgetstore');
Route::get('/getpassword/{customer}/{token}', [
    ForgetPassController::class, 'getPass'
])->name('account.password.get');
Route::post('/getpassword/{customer}/{token}', [
    ForgetPassController::class, 'getPassStore'
]);

//=================================BE=============================================
Route::prefix('admin')->group(function() {
    //login
    Route::get('/login', [
        AdminLoginController::class, 'index'
    ])->name('admin.login.index');
    Route::post('/login', [
        AdminLoginController::class, 'store'
    ])->name('admin.login.store');
    //logout
    Route::get('/logout', [
        AdminLogoutController::class, 'logout'
    ])->name('admin.logout');
    Route::post('/logout', [
        AdminLogoutController::class, 'logout'
    ])->name('admin.logout');
    //register
    Route::get('/register', [
        AdminRegisterController::class, 'rindex'
    ])->name('admin.register.index');
    Route::post('/register', [
        AdminRegisterController::class, 'rstore'
    ])->name('admin.register.store');


    //manager
    Route::get('/manager', [
        AdminHomeController::class, 'manager'
    ])->name('admin.cus.index');

    //add_customer
    Route::get('/add_cus', [
        AdminEditController::class, 'add_cus_index'
    ])->name('admin.add_cus.index');
    Route::post('/add_cus', [
        AdminEditController::class, 'add_cus_update'
    ])->name('admin.add_cus.update');

    //add_new
    Route::get('/add_new', [
        AdminEditController::class, 'add_new_index'
    ])->name('admin.add_new.index');
    Route::post('/add_new', [
        AdminEditController::class, 'add_new_update'
    ])->name('admin.add_new.update');

    //edit
    Route::get('/manager/cus/{id}', [
        AdminEditController::class, 'index_cus'
    ])->name('admin.cus.detail');
    Route::get('/manager/news/{id}', [
        AdminEditController::class, 'index_news'
    ])->name('admin.news.detail');

    Route::post('/manager/cus/{id}', [
        AdminEditController::class, 'edit_cus'
    ])->name('admin.cus.edit');
    Route::post('/manager/news/{id}', [
        AdminEditController::class, 'edit_news'
    ])->name('admin.news.edit');


    //delete
    Route::get('/manager/cus/del/{id}', [
        AdminEditController::class, 'del_cus'
    ])->name('admin.cus.del');
    Route::get('/manager/news/del/{id}', [
        AdminEditController::class, 'del_news'
    ])->name('admin.news.del');

    //search
    Route::post('/manager', [
        AdminHomeController::class, 'search'
    ])->name('admin.search');
});

