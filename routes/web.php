<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IncubateeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\IncubateeProductController;

Route::get('/', function () {
    return view('viewer.home');
});

Auth::routes();

Route::middleware(['auth','web'])->group(function () {

        Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        //incubatee
        Route::get('admin/incubatees', [IncubateeController::class, 'index'])->name('incubatee.index');
        Route::get('admin/incubatees/create', [IncubateeController::class, 'create'])->name('incubatee.create');
        Route::post('admin/incubatees', [IncubateeController::class, 'store'])->name('incubatee.store');
        Route::get('admin/incubatees/{incubatee}/edit', [IncubateeController::class, 'edit'])->name('incubatee.edit');
        Route::put('admin/incubatees/{incubatee}', [IncubateeController::class, 'update'])->name('incubatee.update');
        Route::delete('admin/incubatees/{incubatee}', [IncubateeController::class, 'destroy'])->name('incubatee.destroy');
        Route::post('admin/incubatees/details', [IncubateeController::class, 'getDetails']);
        Route::get('incubatees/{id}', [IncubateeController::class, 'show'])->name('admin.incubatee_show');
        Route::get('admin/incubatees/search', [IncubateeController::class, 'search'])->name('incubatees.search');
        Route::get('admin/incubatee/details', [IncubateeController::class, 'getDetails'])->name('incubatee.details');

        

        //incubateeproduct
        Route::get('admin/incubateeproduct', [IncubateeProductController::class, 'index'])->name('incubateeproduct.index');
        Route::get('admin/incubateeproduct/create', [IncubateeProductController::class, 'create'])->name('incubateeproduct.create');
        Route::post('admin/store', [IncubateeProductController::class, 'store'])->name('incubateeproduct.store');
        Route::get('admin/{incubateeProduct}/edit', [IncubateeProductController::class, 'edit'])->name('incubateeproduct.edit');
        Route::put('admin/{incubateeProduct}', [IncubateeProductController::class, 'update'])->name('incubateeproduct.update');
        Route::delete('admin/{incubateeProduct}', [IncubateeProductController::class, 'destroy'])->name('incubateeproduct.destroy');
        Route::get('product/{id}', [IncubateeProductController::class, 'show'])->name('admin.product_show');
});
        //Viewer 
        Route::get('/', [ViewerController::class, 'dashboard']);
        Route::get('/incubatee/list', [ViewerController::class, 'incubateeList']);
        Route::get('/viewer/incubatees/{id}', [ViewerController::class, 'show'])->name('viewer.incubatee_show');
        Route::get('/viewer/products/{id}', [ViewerController::class, 'showproduct'])->name('viewer.product_show');
        Route::get('productlist', [ViewerController::class, 'productList']);
            
               