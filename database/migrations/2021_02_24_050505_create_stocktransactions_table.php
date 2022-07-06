<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocktransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocktransactions', function (Blueprint $table) {
            $table->bigincrements('transactionid');
            $table->integer('inventoryid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('categoryid')->nullable();
            $table->integer('itemid')->nullable();
            $table->integer('stockinquantity')->nullable();
            $table->date('sotckindate')->nullable();
            $table->integer('customerid')->nullable();
            $table->integer('invoiceid')->nullable();
            $table->string('invoicenumber')->nullable();
            $table->integer('stockoutquantity')->nullable();
            $table->date('stockoutdate')->nullable();
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
        Schema::dropIfExists('stocktransactions');
    }
}
