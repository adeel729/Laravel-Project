<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicemastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoicemasters', function (Blueprint $table) {
            $table->bigIncrements('imasterid');
            $table->integer('warehouseid')->nullable();
            $table->string('invoicennumber')->nullable();
            $table->string('dcparentid')->nullable();
            $table->string('ponumber')->nullable();
            $table->integer('customerid')->nullable();
            $table->string('customerntnno')->nullable();
            $table->string('customergstno')->nullable();
            $table->date('invoicedate')->nullable();
            $table->float('totalbeforetax',30,3)->nullable();
            $table->float('gsttaxamount',30,3)->nullable();
            $table->float('incometaxamount',30,3)->nullable();
            $table->float('saletaxgovernmentamount',30,3)->nullable();
            $table->float('totalaftertax',30,3)->nullable();
            $table->float('nettotal',30,3)->nullable();
            $table->float('paid',30,3)->nullable();
            $table->float('remaining',30,3)->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('invoicemasters');
    }
}
