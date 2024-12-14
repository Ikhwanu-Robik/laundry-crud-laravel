<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LaundryTypeController;

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
    $customers = CustomersController::index();
    $types = LaundryTypeController::index();
    $orders = OrdersController::index();

    $param = [
        "customers" => $customers,
        "types" => $types,
        "orders" => $orders
    ];

    return view('index', $param);
})->name("index");

Route::get("/update", function () {
    $customers = CustomersController::index();
    $types = LaundryTypeController::index();
    $orders = OrdersController::index();

    $param = [
        "customers" => $customers,
        "types" => $types,
        "orders" => $orders
    ];

    return view("update", $param);
})->name("update");

Route::get("/delete", function () {
    $orders = OrdersController::index();

    $param = [
        "orders" => $orders
    ];

    return view("delete", $param);
})->name("delete");

Route::post('/actions/create', [OrdersController::class, "store"]);

Route::post("/actions/update", [OrdersController::class, "update"]);

Route::delete("/actions/delete/{order_id}", [OrdersController::class, "destroy"])->name("orders.destroy");

Route::get("/laundry-types", [LaundryTypeController::class, "index"]);

Route::get('/order', [OrdersController::class, "index"]);