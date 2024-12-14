<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            // "name", "date_acc", "date_clr", "type", "price", "qty", "total"
            $table->id();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('laundry_type_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->date('date_acc');
            $table->date('date_clr');
            $table->foreign('laundry_type_id')->references('id')->on('laundry_types');
            $table->integer('qty');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
