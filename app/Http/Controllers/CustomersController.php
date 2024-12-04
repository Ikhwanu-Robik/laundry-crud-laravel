<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function index()
    {
        $customers = Customer::all();

        return $customers;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $orders)
    {
        //
    }
}
