<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Pet_UserController;
use App\Http\Controllers\ReqController;

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



Route::get('/', function () {
    return view('home');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
         return redirect('/');
    })->name('dashboard');


    //User
    Route::post('/Adopt', [ReqController::class, 'request'])->name('request.form');
    Route::get('/Adopt/{pet_id}', [ReqController::class, 'req'])->name('req.view');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/donate', [UserController::class, 'donate'])->name('donate');
    Route::get('/profile', [UserController::class, 'show'])->name('profile.show');
    Route::put('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/your_request', [UserController::class, 'your_request'])->name('ur_req');
    Route::get ('/my/requests/{id}/edit',[UserController::class,'reEdit'])->name('requests.edit');
    Route::put ('/my/requests/{id}',[UserController::class,'reUpdate'])->name('requests.update');
    Route::delete('/my/requests/{id}/destroy', [UserController::class, 'Destroy'])->name('req.destroy');
    //pets_user
    Route::get('/pet', [Pet_UserController::class, "index"])->name('pet.filter'); //**** */

    //Admin
    Route::get('admin/pets', [PetController::class, 'index'])->name('admin.pets.index');
    Route::put('/admin/pets/{id}', [PetController::class, 'update'])->middleware(CheckRole::class)->name('admin.pets.update');
    Route::post('/pet', [PetController::class, 'store'])->middleware(CheckRole::class)->name('pets.store');
    Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware(CheckRole::class)->name('pets.destroy');
    Route::post('/requests/{id}/approve', [ReqController::class, 'approve'])->name('request.approve');
    Route::post('/requests/{id}/reject', [ReqController::class, 'reject'])->name('request.reject');


    //admin-profile
    Route::get('/information', [AdminController::class, 'infoTable'])->middleware(CheckRole::class)->name('infoTable');
    Route::get('/reqTable', [ReqController::class, 'reqTable'])->middleware(CheckRole::class)->name('reqTable');
    Route::get('/pets/{id}/edit', [AdminController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    Route::get('/pets/information', [PetController::class, 'information'])->name('pets.information');

    //Controller
    Route::get('/profile', [Controller::class, 'show'])->name('profile');
    Route::get('/Rubrakhome', [Controller::class, 'home'])->name('home');
    Route::get('/pets', [PetController::class, 'pets_user'])->name('pets.index');

});





