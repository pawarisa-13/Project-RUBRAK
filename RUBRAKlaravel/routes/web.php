<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Pet_UserController;

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
Route::get('pet', [Pet_UserController::class, "index"]);

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
