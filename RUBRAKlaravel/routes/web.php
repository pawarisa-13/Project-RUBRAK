<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetController;
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
});





 // Route::post('/pets', [AdminController::class, 'store'])->middleware(CheckRole::class)->name('pets.showstore');
//CheckRole middleware
    // Route::get('/pets', function() {
    //     if (auth()->user()->role==='admin') {
    //         return redirect()->route('index-admin');
    //     }else{
    //         return redirect()->route('user.Request');
    // }})->name('pets.index');

    // Route::get('/Rubrakhome', function() {
    //     if (auth()->user()->role==='admin') {
    //         return redirect()->route('home');
    //     }else{
    //         return redirect()->route('home');
    // }})->name('home');

    // ->middleware('role:user')
    // ->name('user.home');
    //     return view('home');

    //Both


    //user

    //Route::get('/request', [UserController::class, 'req'])->name('request.form');
//Route::get('/Rubrakhome', [Controller::class, 'home'])->name('home');
// Route::middleware(['auth', 'verified', 'admin'])
//     ->prefix('admin')
//     ->name('admin.')
//     ->group(function () {
//         Route::get('/dashboard', [AdminDashboardController::class, '__invoke'])
//             ->name('dashboard');

//             //admin
//     Route::get('/pets', [AdminDashboardController::class, 'index'])->middleware(EnsureUserIsAdmin::class)->name('pets.index');
//     Route::post('/pets', [PetController::class, 'store'])->middleware(EnsureUserIsAdmin::class)->name('pets.store');
//     Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->middleware(EnsureUserIsAdmin::class)->name('pets.edit');
//     Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware(EnsureUserIsAdmin::class)->name('pets.destroy');
//     Route::get('/Rubrakhome', [AdminDashboardController::class, 'index'])->middleware(EnsureUserIsAdmin::class);
//     //user

//     Route::get('/Rubrakhome', [UserController::class, 'index']);
//     Route::get('/pets', [UserController::class, 'showpets'])->name('pets.index');
//         // Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
//         // Route::post('/pets', [PetController::class, 'store'])->name('pets.store');
//         // Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->name('pets.edit');
//         // Route::put('/pets/{id}', [PetController::class, 'update'])->name('pets.update');
//         // Route::delete('/pets/{id}', [PetController::class, 'destroy'])->name('pets.destroy');
//         // Route::get('/Rubrakhome', [UserController::class, 'index']);
//         // Route::get('/home', [AdminDashboardController::class, 'index']);
//     });

// // Route::get('/user/dashboard', function () {
    // //     return view('dashboard');
    // // })->name('dashboard');

    // //admin
    // // Route::get('/pets', [AdminDashboardController::class, 'index'])->middleware(EnsureUserIsAdmin::class)->name('pets.index');
    // // Route::post('/pets', [PetController::class, 'store'])->middleware(EnsureUserIsAdmin::class)->name('pets.store');
    // // Route::get('/pets/{id}/edit', [PetController::class, 'edit'])->middleware(EnsureUserIsAdmin::class)->name('pets.edit');
    // // Route::delete('/pets/{id}', [PetController::class, 'destroy'])->middleware(EnsureUserIsAdmin::class)->name('pets.destroy');
    // Route::get('/pets', [AdminDashboardController::class, 'index'])->middleware(EnsureUserIsAdmin::class)->name('pets.index');
    // Route::get('/Rubrakhome', [AdminDashboardController::class, 'home'])->middleware(EnsureUserIsAdmin::class)->name('home');
    // Route::post('/pets', [AdminDashboardController::class, 'store'])->middleware(EnsureUserIsAdmin::class)->name('pets.store');
    // Route::get('/pets/{id}/edit', [AdminDashboardController::class, 'edit'])->middleware(EnsureUserIsAdmin::class)->name('pets.edit');
    // Route::delete('/pets/{id}', [AdminDashboardController::class, 'destroy'])->middleware(EnsureUserIsAdmin::class)->name('pets.destroy');
    // Route::get('/ReqTable', [AdminDashboardController::class, 'ReqTable'])->middleware(EnsureUserIsAdmin::class);
    // Route::get('/profile', [AdminDashboardController::class, 'profile'])->middleware(EnsureUserIsAdmin::class)->name('profile');
// //Admin
    // // Route::get('/dashboard',[AdminController::class, 'index' ])
    // // ->middleware('role:admin')
    // // ->name('admin.home');
    // Route::get('/Rubrakhome', [AdminController::class, 'home'])->name('home');
    // //Route::get('/pets', [AdminController::class, 'index'])->middleware(CheckRole::class)->name('pets.index');
    // //Route::post('/pets', [AdminController::class, 'store'])->middleware(CheckRole::class)->name('pets.store');
    // Route::get('/pets/{id}/edit', [AdminController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    // Route::delete('/pets/{id}', [AdminController::class, 'destroy'])->middleware(CheckRole::class)->name('pets.destroy');
    // //Route::get('/profile', [AdminController::class, 'profile'])->middleware(CheckRole::class)->name('profile');
    // //Route::get('/req', [AdminController::class, 'req'])->middleware(CheckRole::class)->name('request.form');
    // //User
    // // Route::get('/dashboard',[UserController::class, 'index' ])
    // // ->middleware('role:user')
    // // ->name('user.home');
    // //     return view('home');

    // Route::get('/Rubrakhome', [UserController::class, 'home'])->name('home');
    // Route::get('/Rubrakhome', [UserController::class, 'home'])->name('home');
    // //Route::get('/pets', [UserController::class, 'Showpets'])->name('pets.index');
    // //Route::post('/pets', [UserController::class, 'store'])->middleware(CheckRole::class)->name('pets.store');
    // Route::get('/pets/{id}/edit', [UserController::class, 'edit'])->middleware(CheckRole::class)->name('pets.edit');
    // Route::delete('/pets/{id}', [UserController::class, 'destroy'])->middleware(CheckRole::class)->name('pets.destroy');
    // Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    // Route::get('/req', [UserController::class, 'req'])->name('request.form');
    //Route::get('/Rubrakhome', [UserController::class, 'home'])->name('home');
