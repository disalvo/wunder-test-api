<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname', 100);
            $table->string('lastname', 255);
            $table->string('telephone', 20);
            $table->string('address', 255);
            $table->integer('houseNumber');
            $table->string('zipcode', 20);
            $table->string('city', 100);
            $table->string('accountOwner', 150);
            $table->string('iban', 32);
            $table->string('paymentDataId', 100)->nullable();
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
        Schema::dropIfExists('users');
    }
}
