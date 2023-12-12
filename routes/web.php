<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard.admin-index');
})->name('home');

//Auth Controllers
Route::get('/login' , [AuthController::class,'getLoginPage'])->name('get-login-page');
Route::post('/login' , [AuthController::class,'login'])->name('login');
Route::get('/register' , [AuthController::class,'getRegisterPage'])->name('get-register-page');
Route::post('/register' , [AuthController::class,'register'])->name('register');
Route::get('/logout' , [AuthController::class,'logout'])->name('logout');

//User Controllers
Route::prefix('users')->group(function(Router $route){
    $route->get('/',[UserController::class,'index'])->name('admin.users.index');
    $route->get('/create',[UserController::class,'create'])->name('admin.user.create');
    $route->post('/store',[UserController::class,'store'])->name('admin.user.store');
    $route->get('/edit/{user}',[UserController::class,'edit'])->name('admin.user.edit');
    $route->post('/update',[UserController::class,'update'])->name('admin.user.update');
    $route->get('/delete/{user}',[UserController::class,'delete'])->name('admin.user.delete');
});

