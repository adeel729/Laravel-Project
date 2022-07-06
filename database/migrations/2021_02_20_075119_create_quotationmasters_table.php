<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotationmasters', function (Blueprint $table) {
            $table->bigIncrements('qmasterid');
            $table->integer('warehouseid')->nullable();
            $table->string('quotationnumber')->nullable();
            $table->integer('customerid')->nullable();
            $table->date('quotationdate')->nullable();
            $table->float('totalwithouttax')->nullable();
            $table->float('discount')->nullable();
            $table->float('afterdiscount')->nullable();
            $table->float('taxamount')->nullable();
            $table->float('totalaftertax')->nullable();
            $table->float('nettotal')->nullable();
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
        Schema::dropIfExists('quotationmasters');
    }
}
