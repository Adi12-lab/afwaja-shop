<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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
    return view('frontend.index');
})->name("home");
Route::get("test", function() {
    return view("test");
});
Route::get('/account', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::controller(App\Http\Controllers\Frontend\ProductController::class)->group(function() {
//     Route::get("produk", "index");
// });

Route::get("produk", App\Http\Livewire\Frontend\Product\Index::class)->name("frontend.product.index");


Route::prefix("admin")->middleware(["auth", "isAdmin"])->group(function() {
    Route::get("/dashboard",  [DashboardController::class, "index"])->name("admin.dashboard");

      //Category Routes
      Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function() {
        Route::get("category", "index")->name("category.index");
        Route::post("category", "store")->name("category.store");
        Route::get("category/create", "create")->name("category.create");
        Route::get("category/{category}/edit", "edit")->name("category.edit");
        Route::put("category/{category}", "update")->name("category.update");
    });
    
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function() {
        Route::get("product", "index")->name("product.index");
        Route::get("product/create", "create")->name("product.create");
        Route::post("product", "store")->name("product.store");
        Route::get("product/{product_id}/edit", "edit")->name("product.edit");
        Route::put("product/{product_id}", "update")->name("product.update");
    });
    
    Route::get("brands", App\Http\Livewire\Admin\Brand\Index::class);
    Route::get("productVariants", App\Http\Livewire\Admin\ProductVariants\Index::class)->name("productVariant");


});

require __DIR__.'/auth.php';