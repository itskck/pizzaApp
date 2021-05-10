<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoszykTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koszyk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nazwa');
            $table->float('cena');
            $table->integer('rozmiar');
            $table->integer('userID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koszyk');
    }
}
