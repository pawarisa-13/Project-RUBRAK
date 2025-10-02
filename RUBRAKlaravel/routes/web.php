<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
<<<<<<< Updated upstream
use App\Http\Controllers\Admin\AdminDashboardController;
=======
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\Pet_UserController;
use App\Http\Controllers\ReqController;

>>>>>>> Stashed changes
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
    return view('welcome');
});

Route::get('/Rubrakhome', [UserController::class, 'index']);
// Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
// Route::post('/pets', [PetController::class, 'store']);
// Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
// Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');
// Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
<<<<<<< Updated upstream
=======


    //User
    Route::post('/Adopt', [ReqController::class, 'request'])->name('request.form');
    Route::get('/Adopt/{pet_id}', [ReqController::class, 'req'])->name('req.view');
    Route::get('/contact', [UserController::class, 'contact'])->name('contact');
    Route::get('/donate', [UserController::class, 'donate'])->name('donate');
    //pets_user
    Route::get('pet', [Pet_UserController::class, "index"])->name('pet.filter');

    //Admin
    Route::get('admin/pets', [PetController::class, 'index'])->name('admin.pets.index');
    Route::put('/admin/pets/{id}', [PetController::class, 'update'])->middleware(CheckRole::class)->name('admin.pets.update');
    Route::post('/pets', [PetController::class, 'store'])->middleware(CheckRole::class)->name('pets.store');
    Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware(CheckRole::class)->name('pets.destroy');
    //Route::get('/requests', [ReqController::class, 'request'])->name('requests.form');

    //admin-profile
    Route::get('/information', [AdminController::class, 'infoTable'])->middleware(CheckRole::class)->name('infoTable');
    Route::get('/reqTable', [ReqController::class, 'reqTable'])->middleware(CheckRole::class)->name('reqTable');
    Route::get('/pets/{id}/edit', [AdminController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');


    //Controller
    Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    Route::get('/Rubrakhome', [Controller::class, 'home'])->name('home');
    Route::get('/pets', [PetController::class, 'pets_user'])->name('pets.index');
    //Route::post('/pets', [PetController::class, 'pets_user'])->name('pets.index');
>>>>>>> Stashed changes
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, '__invoke'])
            ->name('dashboard');

        Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
        Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
        Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
        Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');
        Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
    });
