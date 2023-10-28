<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, "index"]);

Route::get('/redirects', [HomeController::class, "redirects"]);

Route::get('/users', [AdminController::class, "user"]);

//DELETE ROUTE USING GET
Route::get('/deleteuser/{id}', [AdminController::class, "deleteuser"])->name('deleteuser');

//DELETE ROUTE USING A FORM
Route::delete('/deleteuser/{id}', [AdminController::class, 'destroy'])->name('deleteuser');

//FOODMENU ROUTE
Route::get('/foodmenu', [AdminController::class, 'foodmenu'])->name('admin.foodmenu');

//FOODIMAGE ROUTE
Route::post('/uploadfood', [AdminController::class, 'uploadfood'])->name('admin.uploadfood');

//DELETE FOOD MENU ROUTE USING FORM
Route::delete('/deletemenu/{id}', [AdminController::class, 'deletemenu'])->name('admin.deletemenu');

//DELETE FOOD MENU ROUTE USING FORM
Route::delete('/deletechef/{id}', [AdminController::class, 'deletechef'])->name('admin.deletechef');

//DELETE FOOD MENU ROUTE USING GET
//Route::get('/deletemenu/{id}', [AdminController::class, "deletemenu"])->name('admin.deletemenu');

//EDIT FOOD MENU ROUTE
Route::put('/editmenu/{id}', [AdminController::class, 'editmenu'])->name('admin.editmenu');

//EDIT CHEF MENU ROUTE
Route::get('/editchef/{id}', [AdminController::class, 'editchef'])->name('admin.editchef');

//EDIT FOOD MENU FILE ROUTE
Route::put('/update/{id}', [AdminController::class, 'update'])->name('admin.update');

//EDIT CHEF MENU FILE ROUTE
Route::put('/updatechef/{id}', [AdminController::class, 'updatechef'])->name('admin.updatechef');

//ADD FOOD MENU ROUTE
Route::get('/addfood', [AdminController::class, 'addmenu'])->name('admin.addfood');

//ADD FOOD MENU ROUTE
Route::get('/addchef', [AdminController::class, 'addchef'])->name('admin.addchef');

//INSERT RESERVATION ROUTE
Route::post('/reservation', [AdminController::class, 'reservation'])->name('reservation');

//INSERT RESERVATION ROUTE
Route::get('/viewreservation', [AdminController::class, 'viewreservation'])->name('viewreservation');

//INSERT RESERVATION ROUTE
Route::get('/viewchef', [AdminController::class, 'viewchef'])->name('viewchef');

//INSERT CHEF ROUTE
Route::post('/uploadchef', [AdminController::class, 'uploadchef'])->name('uploadchef');


//INSERT ADDCART ROUTE
Route::post('/addcart/{foodid}', [HomeController::class, 'addcart'])->name('addcart');


//INSERT ADDCART ROUTE
Route::get('/showcart/{id}', [HomeController::class, 'showcart'])->name('showcart');

//REMOVE FROM CART
Route::get('/remove/{id}', [HomeController::class, 'remove'])->name('remove');

//ORDER CONFIRM
Route::post('/orderconfirm', [HomeController::class, 'orderconfirm'])->name('orderconfirm');

//ORDER CONFIRM
Route::get('/orders', [AdminController::class, 'orders'])->name('orders');

//ORDER CONFIRM
Route::get('/search', [AdminController::class, 'search'])->name('search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
