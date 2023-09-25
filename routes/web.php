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


Route::get("/", App\Livewire\Frontend\Index::class)->name("home");
// Route::get("produk", App\Livewire\Frontend\Product\Index::class)->name("frontend.product.index");
Route::controller(App\Http\Controllers\Frontend\ProductController::class)->group(function() {
    Route::get("produk", "index")->name("frontend.product.index");
});
Route::get("produk/{product:slug}", App\Livewire\Frontend\Product\View::class)->name("frontend.product.view");

Route::middleware(["auth"])->group(function() {
    Route::get("favorit", App\Livewire\Frontend\Wishlist\Index::class)->name("wishlist");
    Route::get("keranjang", App\Livewire\Frontend\Cart\Index::class)->name("cart");
    Route::get("profil", App\Livewire\Frontend\User\Index::class, "profile")->name("profil");
});


Route::get("test", function() {
    return view("test");
});


Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function() {
    Route::get("kategori", "categories");
    Route::get("kategori/{category_slug}", "productCategory")->name("frontend.category.view");
    // Route::get("produk/{product_slug}", "productView")->name("frontend.product.view");
});


Route::prefix("admin")->middleware(["auth", "isAdmin"])->group(function() {
    Route::get("/dashboard",  [DashboardController::class, "index"])->name("admin.dashboard");

      //Category Routes
      Route::get("category", App\Livewire\Admin\Category\Index::class)->name("category.index");
      Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function() {
        Route::post("category", "store")->name("category.store");
        Route::get("category/create", "create")->name("category.create");
        Route::get("category/{category}/edit", "edit")->name("category.edit");
        Route::put("category/{category}", "update")->name("category.update");
    });
    
    Route::get("product", App\Livewire\Admin\Product\Index::class)->name("product.index");
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function() {
        Route::get("product/create", "create")->name("product.create");
        Route::post("product", "store")->name("product.store");
        Route::get("product/{product_id}/edit", "edit")->name("product.edit");
        Route::put("product/{product_id}", "update")->name("product.update");
    });
    
    Route::get("brands", App\Livewire\Admin\Brand\Index::class);
    Route::get("product/{id}/variants", App\Livewire\Admin\ProductVariants\Index::class)->name("product.variants");


});

require __DIR__.'/auth.php';