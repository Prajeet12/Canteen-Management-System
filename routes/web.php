<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

// Route::get('/menu', function () {
//     return view('menu');
// });
Route::get('/about', function () {
    return view('about');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/',[HomeController::class,'menu'])->name('client.home');
Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');
Route::get('/foodmenu',[HomeController::class,'foodmenu'])->name('foodmenu');
Route::get('/breakfastmenu',[HomeController::class,'breakfastmenu'])->name('breakfastmenu');
Route::post('/uploadfood',[HomeController::class,'upload'])->name('uploadfood');

Route::get('/deletemenu/{id}',[HomeController::class,'deletemenu'])->name('client.deletemenu');
Route::get('/updateview/{id}',[HomeController::class,'updateview'])->name('client.updateview');
Route::post('/update/{id}',[HomeController::class,'update'])->name('client.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
