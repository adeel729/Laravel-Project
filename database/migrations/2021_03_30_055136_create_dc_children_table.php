<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_children', function (Blueprint $table) {
            $table->bigIncrements('dcChildid');
            $table->integer('dcparentid')->nullable();
            $table->integer('warehouseid')->nullable();
            $table->integer('categoryid')->nullable();
            $table->integer('itemid')->nullable();
            $table->float('quantity')->nullable();
            $table->date('dcdate')->nullable();
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
        Schema::dropIfExists('dc_children');
    }
}
