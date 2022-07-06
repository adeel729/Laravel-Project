<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierLegdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_legders', function (Blueprint $table) {
            $table->bigIncrements('supplier_legder_id');
            $table->integer('supplierid')->nullable();
            $table->double('previous_balance',30,2)->nullable();
            $table->double('totalbill',30,2)->nullable();
            $table->double('payment',30,2)->nullable();
            $table->double('remainig',30,2)->nullable();
            $table->string('ponumber')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('discription')->nullable();
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
        Schema::dropIfExists('supplier_legders');
    }
}
