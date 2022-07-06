<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('customerid');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('email')->nullable();
            $table->string('contactpersonemail')->nullable();
            $table->string('ntn')->nullable();
            $table->string('stn')->nullable();
            $table->float('creditlimit')->nullable();
            $table->float('previousbalance')->nullable();
            $table->integer('credittime')->nullable();
            $table->float('discountrate')->nullable();
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
