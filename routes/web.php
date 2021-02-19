<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'login')->name('login');
Route::post('/login', [UserController::class, 'loginAction'])->name('loginAction');

Route::group(['middleware' => ['isApplicant','auth']], function () {
    Route::get('/home', [UserController::class, 'homepage'])->name('home');
    Route::post('/apply/{applicant_id}', [StudentController::class, 'apply'])->name('apply');

});

Route::group(['middleware' => ['isAdmin', 'auth']], function () {
    Route::get('/create', [StudentController::class, 'create']);
    Route::post('/delete/{applicant_id}', [StudentController::class, 'delete'])->name('deleteAccount');
    Route::get('/edit/{applicant_id}', [StudentController::class, 'edit'])->name('editAccount');
    Route::post('/update/{applicant_id}', [StudentController::class, 'update'])->name('updateAccount');
    Route::get('/student', [StudentController::class, 'index'])->name('all_student');
    Route::post('/create-account', [StudentController::class, 'createStudentAccount'])->name('createAccount');
});
