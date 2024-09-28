<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
//login routes
Route::get('/',[TeachersController::class,'loginpage']);
Route::post('/loginpass',[TeachersController::class,'loginpass'])->name('loginpass');
//register routes
Route::get('/register',[TeachersController::class,'register']);
Route::post('/addteachers',[TeachersController::class,'addTeachers'])->name('addteachers');
Route::get('/showstudents',[TeachersController::class,'showstudents'])->name('showstudents');
Route::post('/updatestudents',[TeachersController::class,'updatestudets'])->name('updatestudentdetails');
Route::post('/deletestudent',[TeachersController::class,'delete'])->name('deletestudent');
Route::get('/students',[TeachersController::class,'students'])->name('students');
Route::post('/addstudents',[TeachersController::class,'addstudentsdetails'])->name('addstudents');




