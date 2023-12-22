<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CBMSController;

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
Route::get('/', [HomeController::class, 'menu'])->name('client.home');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/foodmenu', [HomeController::class, 'foodmenu'])->name('foodmenu');
Route::get('/add', [HomeController::class, 'create'])->name('add');
Route::get('/breakfastmenu', [HomeController::class, 'breakfastmenu'])->name('breakfastmenu');
Route::post('/uploadfood', [HomeController::class, 'upload'])->name('uploadfood');

//Gallery
Route::get('/gallery', [HomeController::class, 'gallery'])->name('client.gallery');
Route::post('/add-gallery', [HomeController::class, 'addgallery'])->name('add-gallery');
Route::post('/update-gallery/{id}', [HomeController::class, 'updategallery'])->name('update-gallery');
Route::delete('/delete-gallery/{id}', [HomeController::class, 'deleteGallery'])->name('deleteGallery');


//home
Route::get('/clienthome', [HomeController::class, 'clienthome'])->name('client.clienthome');
Route::post('/add-clienthome', [HomeController::class, 'addclienthome'])->name('add-clienthome');
Route::post('/update-clienthome/{id}', [HomeController::class, 'updateclienthome'])->name('update-clienthome');

//category
Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::post('/add-category', [CategoryController::class, 'add'])->name('add-category');
Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('update-category');
Route::delete('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete-category');

//menu
Route::get('/menu', [FoodController::class, 'menu'])->name('menu');
Route::post('/add-menu', [FoodController::class, 'add'])->name('add-menu');
Route::post('/update-menu/{id}', [FoodController::class, 'update'])->name('update-menu');
Route::delete('/delete-menu/{id}', [FoodController::class, 'delete'])->name('delete-menu');
Route::get('/search', [FoodController::class, 'search'])->name('search');

//aboutus
Route::get('/aboutus', [HomeController::class, 'about'])->name('aboutus');
Route::post('/add-about', [HomeController::class, 'addabout'])->name('add-about');
Route::post('/update-about/{id}', [HomeController::class, 'update'])->name('update-about');

//menu
Route::get('/deletemenu/{id}', [HomeController::class, 'deletemenu'])->name('client.deletemenu');
Route::get('/updateview/{id}', [HomeController::class, 'updateview'])->name('client.updateview');
Route::post('/update/{id}', [HomeController::class, 'update'])->name('client.update');

//order
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::post('/add-order', [OrderController::class, 'generateorder'])->name('add-order');
Route::get('/takeorder/{id}', [OrderController::class, 'takeorder'])->name('takeorder');
Route::post('/add-quantity/{id}', [OrderController::class, 'quantity'])->name('addquantity');
Route::post('/update-quantity/{id}', [OrderController::class, 'update'])->name('updatequantity');
Route::get('/searchorder', [OrderController::class, 'searchorder'])->name('searchorder');
Route::delete('/delete-order/{id}', [OrderController::class, 'deleteOrder'])->name('deleteOrder');
Route::delete('/deleteOrderItem/{id}', [OrderController::class, 'deleteOrderItem'])->name('deleteOrderItem');
Route::post('/bill/{id}', [OrderController::class, 'generateInvoice'])->name('bill');

//about
Route::post('/add-about', [HomeController::class, 'addabout'])->name('add-about');
Route::post('/update-about/{id}', [HomeController::class, 'update'])->name('update-about');

//contact
Route::get('/contact', [ContactController::class, 'sendMessage'])->name('contact.sendMessage');
Route::post('/submit-ContactForm', [ContactController::class, 'submitContactForm'])->name('submit.contact.form');

//Payment
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/add-payment', [PaymentController::class, 'add'])->name('add-payment');
Route::post('/update-payment/{id}', [PaymentController::class, 'update'])->name('update-payment');
Route::delete('/delete-payment/{id}', [PaymentController::class, 'delete'])->name('delete-payment');

//Bill

Route::get('/postbill', [CBMSController::class, 'index'])->name('postbill');
Route::get('/post-bill', [CBMSController::class, 'postBill']);
Route::get('/post-credit-note', [CBMSController::class, 'postCreditNote']);



//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';