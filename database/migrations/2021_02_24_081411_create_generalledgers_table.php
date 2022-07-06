<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralledgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalledgers', function (Blueprint $table) {
            $table->bigIncrements('ledgerid');
            $table->integer('inventoryid')->nullable();
            $table->integer('imasterid')->nullable();
            $table->integer('customerid')->nullable();
            $table->integer('accountid')->nullable();
            $table->string('discription')->nullable();
            $table->date('actiondate')->nullable();
            $table->double('debit',20,2)->nullable();
            $table->double('credit',20,2)->nullable();
            $table->double('balance',20,2)->nullable();
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
        Schema::dropIfExists('generalledgers');
    }
}
