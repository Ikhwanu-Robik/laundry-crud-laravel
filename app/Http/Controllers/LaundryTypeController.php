<?php

namespace App\Http\Controllers;

use App\Models\LaundryTypes;
use Illuminate\Http\Request;

class LaundryTypeController extends Controller
{
    public static function index() {
        return LaundryTypes::all();
    }
}
