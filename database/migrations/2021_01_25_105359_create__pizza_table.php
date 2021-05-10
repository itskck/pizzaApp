<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_pizza', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa');
            $table->float('cenaMala');
            $table->float('cenaSrednia');
            $table->float('cenaDuza');
            $table->string('kategoria');
            $table->string('opis');
            $table->string('sciezka');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('_pizza');
    }
}
