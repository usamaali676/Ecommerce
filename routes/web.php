<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerDashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\OrderItem;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Support\Facades\Auth;

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

Route::controller(DashboardController::class)->group(function () {
Route::get('/', 'index')->name('fronthome');
Route::get('/contact', 'contact')->name('contact');
Route::get('/about', 'about')->name('about');
Route::get('/allproducts', 'allproducts')->name('allproducts');
Route::get('/categories/{slug?}', 'categorysearch')->name('categorysearch');
Route::get('/cart', 'cart')->name('cart');
Route::get('/checkout', 'checkout')->name('checkout');
Route::get('/products/{slug?}', 'singleproduct')->name('singleproduct');
});
Route::controller(ReviewsController::class)->group(function () {
    Route::post('/add-review', 'store')->name('add-review');
    Route::get('/review-delete/{id?}', 'delete')->name('review-delete');
});

Route::controller(CustomerDashboard::class)->middleware('auth')->group(function () {
    Route::get('/dashboard' , 'index')->name('customerdashboard');
    Route::post('update-Account-detail/{id?}', 'updateuser')->name('update-account-detail');
});

Route::controller(CartController::class)->group( function () {
    Route::post('/addcart', 'addcart')->name('addcart');
    Route::post('/deleteitem', 'deleteitem')->name('deleteitem');
    Route::post('/updateCart', 'updateCart')->name('updateCart');
});
Route::controller(OrderItemController::class)->prefix('orderitem')->as('orderitem.')->group(function () {
    Route::get('/edit/{id}', 'edit')->name('edit')->middleware('role');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete')->middleware('role');
});
Route::controller(OrderController::class)->prefix('order')->as('order.')->group(function () {
    Route::post('/placeorder', 'placeorder')->name('placeorder');
    Route::get('/index', 'index')->name('index');
    // Route::get('/create', 'create')->name('create');
    // Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit')->middleware('role');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete')->middleware('role');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/payment/success', 'payment_success')->name('payment.success');
    Route::get('/payment/cancel', 'payment_cancel')->name('payment.cancel');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('role');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(RoleController::class)->prefix('role')->as('role.')->middleware('role')->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
    });

Route::controller(UserController::class)->prefix('user')->as('user.')->group(function () {
    Route::get('/index', 'index')->name('index')->middleware('role');
    Route::get('/create', 'create')->name('create')->middleware('role');
    Route::post('/store', 'store')->name('store')->middleware('role');
    Route::get('/edit/{id}', 'edit')->name('edit')->middleware('role');
    Route::post('/update/{id}', 'update')->name('update')->middleware('role');
    Route::get('/delete/{id}', 'delete')->name('delete')->middleware('role');
    Route::get('/show/{id}', 'show')->name('show');
    });

    Route::controller(CategoryController::class)->prefix('category')->as('category.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete')->middleware('role');
        });

    Route::controller(ProductController::class)->prefix('product')->as('product.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete')->middleware('role');
        Route::get('/show/{id}', 'show')->name('show');
        });
