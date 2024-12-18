<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = "orders";

    public $timestamps = false;

    protected $fillable = ["customer_id", "laundry_type_id", "date_acc", "date_clr", "qty", "total"];
}