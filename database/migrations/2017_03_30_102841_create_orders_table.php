<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('Name');
            $table->string('Email');
            $table->string('Phone');
            $table->string('City');
            $table->string('Ward');
            $table->string('Address');
            $table->string('Method')->default('Ngân Lượng');
            $table->unsignedInteger('TotalQuantity');
            $table->unsignedInteger('TotalPrice');
            $table->boolean('Status')->default(1);
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
        Schema::dropIfExists('orders');
    }
}
