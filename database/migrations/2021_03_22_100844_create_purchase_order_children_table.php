<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_children', function (Blueprint $table) {
            $table->bigIncrements('purchase_oredr_child_id');
            $table->integer('purchase_order_id')->nullable();
            $table->integer('categoryid')->nullable();
            $table->integer('subcategoryid')->nullable();
            $table->integer('itemid')->nullable();
            $table->double('unit_price',30,2)->nullable();
            $table->double('quantity',30,2)->nullable();
            $table->double('total',30,2)->nullable();
            $table->double('sale_price',30,2)->nullable();
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
        Schema::dropIfExists('purchase_order_children');
    }
}
