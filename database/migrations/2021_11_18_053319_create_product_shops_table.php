<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_shops', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->string('code', 50)->nullable();
            $table->double('price')->nullable();
            $table->double('price_selling')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_shops');
    }
}
