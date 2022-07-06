<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicechildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicechildren', function (Blueprint $table) {
            $table->bigIncrements('ichildid');
            $table->integer('imasterid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('categoryid')->nullable();
            $table->integer('itemid')->nullable();
            $table->float('unitprice')->nullable();
            $table->float('quantity')->nullable();
            $table->float('totalprice')->nullable();
            $table->float('tax')->nullable();
            $table->float('aftertax')->nullable();
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
        Schema::dropIfExists('invoicechildren');
    }
}
