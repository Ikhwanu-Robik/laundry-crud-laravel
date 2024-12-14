<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrder;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Requests\CreateOrder;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        $orders = Orders::all();

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOrder $request)
    {
        $validated = $request->validated();

        $order = Orders::create([
            "name" => $validated["name"],
            "date_acc" => date("Y-m-d"),
            "date_clr" => date("Y-m-d", time() + 3 * 24 * 60 * 60),
            "type" => $validated["type"],
            "price" => $validated["price"],
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

        $order->name = $validated["name"];
        $order->type = $validated["type"];
        $order->date_acc = $validated["date_acc"];
        $order->date_clr = $date_clr;
        $order->price = $validated["price"];
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
