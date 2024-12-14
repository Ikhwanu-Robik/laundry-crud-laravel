<?php

namespace App\Http\Controllers;

use App\Models\LaundryTypes;
use Illuminate\Http\Request;

class LaundryTypeController extends Controller
{
    public static function index() {
        return LaundryTypes::all();
    }

    public static function findById($id)
    {
        $customer = LaundryTypes::findOrFail($id);

        return $customer;
    }
}
