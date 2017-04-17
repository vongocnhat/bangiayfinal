<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name');
            $table->boolean('Gender');
            $table->date('Birthday');
            $table->string('City');
            $table->string('Ward');
            $table->string('Address');
            $table->string('Phone');
            $table->string('Email')->unique();
            $table->string('User')->unique();
            $table->unsignedInteger('Balance')->default(0);
            $table->string('AccountNumber');
            $table->string('password');
            $table->boolean('IsActive')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
}
