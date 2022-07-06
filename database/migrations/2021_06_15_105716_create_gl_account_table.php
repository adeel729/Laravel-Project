<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gl_account', function (Blueprint $table) {
            $table->bigincrements('gl_id');
            $table->integer('a_id')->nullable();
            $table->string('description')->nullable();
            $table->date('t_date')->nullable();
            $table->string('folio')->nullable();
            $table->float('debit')->nullable();
            $table->float('credit')->nullable();
            $table->float('balance')->nullable();
            $table->boolean('status')->nullable();
            $table->string('voucher_no')->nullable();
            $table->string('p_id')->nullable();
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
        Schema::dropIfExists('gl_account');
    }
}
