<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialOfferChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_offer_children', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id');
            $table->integer('categoryid');
            $table->integer('itemid');
            $table->float('unitprice');
            $table->float('quantity');
            $table->float('totalprice');
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
        Schema::dropIfExists('financial_offer_children');
    }
}
