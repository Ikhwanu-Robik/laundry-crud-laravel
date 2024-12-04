<?php

namespace App\Http\Controllers;

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    //I need to make CreateOrder or Order object when inserting/updating a field

    public function update(CreateOrder $request, Orders $orders)
    {
        $validated = $request->validate([
            "id" => "required",
            "name" => "required",
            "type" => "required",
            "date_acc" => "required",
            "price" => "required",
            "qty" => "required",
            "total" => "required"
        ]);

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
