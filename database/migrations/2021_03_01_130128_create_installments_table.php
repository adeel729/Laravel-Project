<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('installmentid');
            $table->integer('imasterid')->nullable();
            $table->integer('customerid')->nullable();
            $table->string('invoicenumber')->nullable();
            $table->date('installmentdate')->nullable();
            $table->double('previousbalance',20,2)->nullable();
            $table->double('installmentamount',20,2)->nullable();
            $table->double('currentremainig',20,2)->nullable();
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
        Schema::dropIfExists('installments');
    }
}
