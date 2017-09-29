<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class ChangeNameOfCoinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('coins', 'coins_exchange');
        Schema::rename('coin_lists', 'coins');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('coins_exchange', 'coins');
        Schema::rename('coins', 'coin_lists');
    }
}
