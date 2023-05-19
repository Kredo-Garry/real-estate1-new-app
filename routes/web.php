<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\EmailInquiryController;
use App\Http\Controllers\CommentController;

#Admin
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\HomesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/property/create', [HomeController::class, 'create'])->name('property.create');
    Route::post('/property/store', [HomeController::class, 'store'])->name('property.store');
    Route::delete('/property/{id}/delete', [HomeController::class, 'destroy'])->name('property.destroy');


    // Broker
    Route::get('/broker/create', [BrokerController::class, 'create'])->name('broker.create');
    Route::post('/broker/store', [BrokerController::class, 'store'])->name('broker.store');

    //Add Email For Inquiry
    Route::get('/inquire/showaddemail', [EmailInquiryController::class, 'show'])->name('mail.show');
    Route::post('/inquire/addemail', [EmailInquiryController::class, 'create'])->name('mail.add');

    //Send Inquiry Mail Route
    Route::get('/inquire/sendmail', [MailController::class, 'index'])->name('mail.inquiry');;

    // Comment
    Route::post('/comment/{property_id}/store', [CommentController::class, 'store'])->name('comment.store');

    # Admin Controllers
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
        // User
        Route::get('/users', [UsersController::class, 'index'])->name('users');

        //Properties
        Route::get('/properties', [HomesController::class, 'index'])->name('properties');
    });
});
