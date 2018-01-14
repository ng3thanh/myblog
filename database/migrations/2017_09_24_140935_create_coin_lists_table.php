<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoinListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symbol')->comment('Symbol of coin');
            $table->string('name')->comment('Name of coin');
            $table->date('time')->comment('Time posted on Bittrex');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coin_lists');
    }
}
