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
            $table->string('name');
            $table->date('date_acc');
            $table->date('date_clr');
            $table->string('type');
            $table->integer('price');
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
