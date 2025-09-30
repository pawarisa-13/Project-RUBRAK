<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\Admin\AdminDashboardController;
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

Route::get('/Rubrakhome',[UserController::class,'index'])->name('pets.edit');
Route::get('/pets', [PetController::class, 'index']);
Route::post('/pets', [PetController::class, 'store']);
Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');
Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    //User
    Route::get('/req', [PetController::class, 'req'])->name('request.form');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/donate', [UserController::class, 'donate'])->name('donate');
    //pets_user

    //Admin
    Route::get('admin/pets', [PetController::class, 'index'])->name('admin.pets.index');
    Route::post('/pets', [PetController::class, 'store'])->middleware(CheckRole::class)->name('pets.store');
    Route::put('/admin/pets/{id}', [PetController::class, 'update'])->middleware(CheckRole::class)->name('admin.pets.update');
    Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware(CheckRole::class)->name('pets.destroy');

    //admin-profile
    Route::get('/information', [AdminController::class, 'infoTable'])->middleware(CheckRole::class)->name('infoTable');
    Route::get('/reqTable', [AdminController::class, 'reqTable'])->middleware(CheckRole::class)->name('reqTable');
    Route::get('/pets/{id}/edit', [AdminController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');


    //Controller
    Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    Route::get('/Rubrakhome', [Controller::class, 'home'])->name('home');
    Route::get('/pets', [PetController::class, 'pets_user'])->name('pets.index');
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, '__invoke'])
            ->name('dashboard');
    });

