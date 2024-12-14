<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrder;
use App\Http\Requests\UpdateOrder;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\LaundryTypeController;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        $orders = Orders::all();

        $new_orders = [];

        foreach ($orders as $order) {
            $array_order = [
                'id' => $order->id,
                'customer_name' => CustomersController::findById($order->customer_id)->name,
                'laundry_type_name' => LaundryTypeController::findById($order->laundry_type_id)->name,
                'date_acc' => $order->date_acc,
                'date_clr' => $order->date_clr,
                'price' => LaundryTypeController::findById($order->laundry_type_id)->price,
                'qty' => $order->qty,
                'total' => LaundryTypeController::findById($order->laundry_type_id)->price * $order->qty
            ];

            array_push($new_orders,  $array_order);
        }

        return $new_orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrder $request)
    {
        $validated = $request->validated();

        $order = Orders::create([
            "customer_id" => $validated["customer_id"],
            "laundry_type_id" => $validated["laundry_type_id"],
            "date_acc" => date("Y-m-d"),
            "date_clr" => date("Y-m-d", time() + 3 * 24 * 60 * 60),
            "qty" => $validated["qty"],
            "total" => $validated["total"]
        ]);

        return redirect()->route("index");
    }

    /**
     * Update the specified resource in storage.
     */

    //I need to make CreateOrder or Order object when inserting/updating a field

    public function update(UpdateOrder $request, Orders $orders)
    {
        $validated = $request->validated();

        $date_clr = date("Y-m-d", strtotime($validated["date_acc"]) + 3 * 24 * 60 * 60);

        $order = Orders::find($validated["id"]);

        $order->customer_id = $validated["customer_id"];
        $order->laundry_type_id = $validated["laundry_type_id"];
        $order->date_acc = $validated["date_acc"];
        $order->date_clr = $date_clr;
        $order->qty = $validated["qty"];
        $order->total = $validated["total"];

        $order->save();

        return redirect()->route("update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Orders::findOrFail($id);
        $order->forceDelete();

        return redirect()->route("delete");
    }
}
