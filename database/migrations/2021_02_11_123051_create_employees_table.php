<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('employeeid');
            $table->integer('departmentid')->nullable();
            $table->string('name')->nullable();
            $table->string('fathername')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('salary')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('cnic')->nullable();
            $table->string('mobilenumber',15)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
