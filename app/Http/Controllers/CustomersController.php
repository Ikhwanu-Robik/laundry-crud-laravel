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

    public static function findById($id)
    {
        $customer = Customer::findOrFail($id);

        return $customer;
    }
}
