<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditTableCoins extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coins', function (Blueprint $table) {
            $table->renameColumn('volumn', 'volume');
        });
        
        Schema::table('coins', function (Blueprint $table) {
            $table->float('volume', 20, 8)->change();
            $table->float('highest_price', 15, 8)->change();
            $table->float('lowest_price', 15, 8)->change();
            $table->float('base_volume', 20, 8)->after('volume');
            $table->integer('open_buy_orders')->after('lowest_price');
            $table->integer('open_sell_orders')->after('open_buy_orders');
            $table->float('prev_day', 20, 8)->after('open_sell_orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coins', function (Blueprint $table) {
            $table->dropColumn('base_volume');
            $table->dropColumn('open_buy_orders');
            $table->dropColumn('open_sell_orders');
            $table->dropColumn('prev_day');
        });
    }
}
