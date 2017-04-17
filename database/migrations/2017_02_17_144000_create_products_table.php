<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('IdCategory');
            $table->string('Name');
            $table->unsignedInteger('BestSeller')->default(0);
            $table->unsignedInteger('MostViewed')->default(0);
            $table->string('Description')->default('');
            $table->unsignedInteger('Price');
            $table->unsignedInteger('PricePromotion')->default(0);
            // $table->string('Image'),
            // #TotalQuantity: unsignedInteger = 0
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
        Schema::dropIfExists('products');
    }
}
