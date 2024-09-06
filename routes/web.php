<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


// Static Route
Route::get('/blogs', function () {
    return "Hello, This is blog page.";
});


// Dynamic Route
Route::get('/blogs/{id}', function($id) {
    return "Hello, This is blog detail - $id.";
});


// Routes Name
Route::get('/dashboard', function(){
    return "Welcome from TPP Program Dashboard!";
})->name('dashboard.tpp');

Route::get('/tpp', function(){
    return redirect()->route('dashboard.tpp');
});


// Group Routes
Route::prefix('dashboard')->group(function() {
    Route::get('/admin', function() {
        return "This is admin dashboard.";
    });

    Route::get('/users', function() {
        return "This is user dashboard.";
    });
});

// Larvael Views
Route::get('/students', [StudentController::class, 'index']);

Route::get('/', function() {
    return view('index');
});

// Model and Migrations

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
