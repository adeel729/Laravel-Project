<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->bigIncrements('inventoryid');
            $table->integer('supplierid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('categoryid')->nullable();
            $table->integer('itemid')->nullable();
            $table->string('batchnumber')->nullable();
            $table->double('unitprice',20,2)->nullable();
            $table->integer('quantity')->nullable();
            $table->double('totalprice',20,2)->nullable();
            $table->float('saleprice')->nullable();
            $table->string('catalognumber')->nullable();
            $table->string('serialnumber')->nullable();
            $table->date('purchasedate')->nullable();
            $table->date('manufactureddate')->nullable();
            $table->date('expirydate')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
