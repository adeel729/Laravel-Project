<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDcParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dc_parents', function (Blueprint $table) {
            $table->bigIncrements('dcparentid');
            $table->integer('warehouseid')->nullable();
            $table->string('dcnumber')->nullable();
            $table->integer('customerid')->nullable();
            $table->date('quotationdate')->nullable();
            $table->float('totalwithouttax')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('dc_parents');
    }
}
