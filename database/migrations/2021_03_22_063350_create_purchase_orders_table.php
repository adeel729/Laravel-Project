<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->bigIncrements('purchase_order_id');
            $table->string('potype')->nullable();
            $table->integer('supplierid')->nullable();
            $table->date('purchase_order_date')->nullable();
            $table->double('totalbill',30,2)->nullable();
            $table->double('current_payment',30,2)->nullable();
            $table->double('remaining',30,2)->nullable();
            $table->string('billnumber')->nullable();
            $table->string('postatus')->nullable();
            $table->string('payment_type')->nullable();
            $table->text('discription')->nullable();
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
        Schema::dropIfExists('purchase_orders');
    }
}
