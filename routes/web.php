<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DocController;

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

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/add_doctor_view',[AdminController::class,'addDocView']);

Route::get('/registerdoc/{id}',[AdminController::class,'registerdoc']);

Route::post('/uploadDoc',[AdminController::class,'uploadDoc']);

Route::post('/ruploadDoc/{id}',[AdminController::class,'ruploadDoc']);

Route::post('/addAppointment',[HomeController::class,'addAppointment']);

Route::get('/myAppointments',[HomeController::class,'myAppointments']);

Route::get('/allDocs',[HomeController::class,'allDocs']);

Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);

Route::get('/show_appointments',[AdminController::class,'show_appointment']);

Route::get('/approved/{id}',[AdminController::class,'approved']);

Route::get('/canceled/{id}',[AdminController::class,'canceled']);

Route::get('/show_doctors',[AdminController::class,'show_doctors']);

Route::get('/unregistered',[AdminController::class,'unregistered']);

Route::get('/deleteDoc/{id}',[AdminController::class,'deleteDoc']);

Route::get('/updateDoc/{id}',[AdminController::class,'updateDoc']);

Route::post('/editdoc/{id}',[AdminController::class,'editdoc']);

Route::get('/MailView/{id}',[AdminController::class,'MailView']);

Route::post('/sendmail/{id}',[AdminController::class,'sendmail']);

Route::get('/future_appointments',[DocController::class,'future_appointments']);

Route::get('/today_appointments',[DocController::class,'today_appointments']);

Route::get('/all_appointments',[DocController::class,'all_appointment']);

Route::get('/attend_to/{id}',[DocController::class,'attend_to']);

Route::post('/addHistory/{id}',[DocController::class,'addHistory']);

Route::get('/view_history/{user_id}',[DocController::class,'view_history']);

Route::get('/allPatients',[DocController::class,'allPatients']);

Route::get('/myHistory',[HomeController::class,'myHistory']);








Route::get('calendar-event', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);






