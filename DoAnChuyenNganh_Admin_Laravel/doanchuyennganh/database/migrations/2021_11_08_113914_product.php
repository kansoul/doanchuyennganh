<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('product_type');
            $table->integer('qlt'); 
            $table->integer('price'); 
            $table->string('msp');
            $table->longText('description');
            $table->integer('isPopular');
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
        Schema::dropIfExists('product');
    }
}
