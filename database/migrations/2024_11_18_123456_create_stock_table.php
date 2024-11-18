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
            $table->string('size')->change();
            $table->string('weight')->change();
            $table->string('height')->change();
            $table->string('width')->change();
            $table->string('length')->change();
        });
    }

    // Reverse the migrations
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
