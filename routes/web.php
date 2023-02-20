<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModalController;

use App\Models\Item;


// Routes for Items
// Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

// Routes for Brands
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('/brands/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('/brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');

Route::get('/modals',  [ModalController::class, 'index'])->name('modals.index');
Route::get('modals/create',[ModalController::class, 'create'])->name('modals.create');
Route::post('modals', [ModalController::class, 'store'])->name('modals.store');
Route::get('modals/{model}/edit', [ModalController::class, 'edit'])->name('modals.edit');
Route::put('modals/{model}', [ModalController::class, 'update'])->name('modals.update');
Route::delete('modals/{modal}',[ModalController::class, 'destroy'])->name('modals.destroy');




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('', [ItemController::class, 'index'])->name('items.index');







Route::get('/dashboard', function () {

    
    // $item = Item::all();
    // return view('dashboard', compact('item'));
    // // return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




// Admin 
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        // login route
        Route::get('login','AuthenticatedSessionController@create')->name('login');
        Route::post('login','AuthenticatedSessionController@store')->name('adminlogin');
        Route::get('register','AuthenticatedSessionController@register');
    });
    Route::middleware('admin')->group(function(){
     
        // Route::post('register','AuthenticatedSessionController@register');

        Route::get('dashboard','HomeController@index')->name('dashboard');

        Route::get('admin-test','HomeController@adminTest')->name('admintest');
        Route::get('editor-test','HomeController@editorTest')->name('editortest');

        Route::resource('posts','PostController');

    });
    Route::post('logout','Auth\AuthenticatedSessionController@destroy')->name('logout');
});

// //  route for userdashboard
// Route::get('/item', [ItemController::class, 'additems']);
// Route::get('/additem', [ItemController::class, 'storeitems']);
// // /////ad brand
// Route::get('/brand/all','BrandController@allbrand')->name('all.brand');
// Route::post('/brand/add','BrandController@addbrand')->name('store.brand');












