<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


// Verb	    URI		        Action	Route Name
// GET	    /photos		    index	photos.index
// GET	    /photos/create	create	photos.create
// POST	    /photos/store	        photos.store
// GET	    /photos/{photo}/show	photos.show
// GET	    /photos/{photo}/edit	edit	photos.edit
// PUT/PATCH/photos/{photo}	update	photos.update
// DELETE	/photos/{photo}	destroy	photos.destroy


Route::resource("category",CategoryController::class);
Route::resource("product",ProductController::class);
Route::resource("coupon",CouponController::class);
Route::resource("address",AddressController::class);
Route::resource("order",OrderController::class);
Route::resource("order-item",OrderItemController::class);


Route::get("/",[HomeController::class,"home"]);
Route::get("/checkout",[HomeController::class,"checkout"]);
Route::get("/view",[HomeController::class,"product_view"]);

// ---------------------------------------------- admin work ----------------- 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
