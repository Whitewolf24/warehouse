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
            $table->bigIncrements('id')->change();
            $table->string('sku')->unique()->change();
            $table->string('name')->change();
            $table->string('price')->change();
            $table->string('size')->nullable()->change();
            $table->string('weight')->nullable()->change();
            $table->string('height')->nullable()->change();
            $table->string('width')->nullable()->change();
            $table->string('length')->nullable()->change();
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
