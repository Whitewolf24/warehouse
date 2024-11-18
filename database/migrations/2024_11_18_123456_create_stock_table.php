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
            $table->bigIncrements('id');
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('price');
            $table->string('size')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
