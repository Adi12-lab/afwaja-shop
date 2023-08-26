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
Route::get("produk", App\Livewire\Frontend\Product\Index::class)->name("frontend.product.index");
Route::get("produk/{product:slug}", App\Livewire\Frontend\Product\View::class)->name("frontend.product.view");
Route::get("favorit", App\Livewire\Frontend\Wishlist\Index::class)->name("wishlist");

Route::get("test", function() {
    return view("test");
});
Route::get('/account', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function() {
    Route::get("kategori", "categories");
    Route::get("kategori/{category_slug}", "productCategory")->name("frontend.category.view");
    // Route::get("produk/{product_slug}", "productView")->name("frontend.product.view");
});


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
    
    Route::get("brands", App\Livewire\Admin\Brand\Index::class);
    Route::get("productVariants", App\Livewire\Admin\ProductVariants\Index::class)->name("productVariant");


});

require __DIR__.'/auth.php';