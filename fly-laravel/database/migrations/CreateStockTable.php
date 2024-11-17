<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    // Run the migrations
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('size');
            $table->decimal('weight', 8, 2);
            $table->decimal('height', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('length', 8, 2);
            $table->timestamps();
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
