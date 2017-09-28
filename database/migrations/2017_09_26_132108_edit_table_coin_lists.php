<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableCoinLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coin_lists', function (Blueprint $table) {
            $table->dropColumn('symbol');
            $table->dropColumn('name');
            $table->dropColumn('time');
            $table->string('market_currency')->after('id');
            $table->string('base_currency')->after('market_currency');
            $table->string('market_currency_long')->after('base_currency');
            $table->string('base_currency_long')->after('market_currency_long');
            $table->string('min_trade_size')->after('base_currency_long');
            $table->string('market_name')->after('min_trade_size');
            $table->boolean('is_active')->after('market_name');
            $table->date('created_time')->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coin_lists', function (Blueprint $table) {
            $table->dropColumn('market_currency');
            $table->dropColumn('base_currency');
            $table->dropColumn('market_currency_long');
            $table->dropColumn('base_currency_long');
            $table->dropColumn('min_trade_size');
            $table->dropColumn('market_name');
            $table->dropColumn('is_active');
            $table->dropColumn('created_time');
            $table->string('symbol');
            $table->string('name');
            $table->date('time');
        });
    }
}
