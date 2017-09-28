<?php
namespace App\Console\Commands;

use App\Models\Coin;
use App\Models\CoinList;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GetCoinData extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:get_price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get price of Altcoin in Bittrex market';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $listCoins = file_get_contents(Config::get('url.bittrex_api_market'));
            $dataCoins = json_decode($listCoins, true);
            if ($dataCoins['success'] === true) {
                foreach ($dataCoins['result'] as $key => $val) {
                    $checkExists = CoinList::where('market_name', $val['MarketName'])->first();
                    if (! $checkExists) {
                        $coin = new CoinList();
                        $coin->market_currency = $val['MarketCurrency'];
                        $coin->base_currency = $val['BaseCurrency'];
                        $coin->market_currency_long = $val['MarketCurrencyLong'];
                        $coin->base_currency_long = $val['BaseCurrencyLong'];
                        $coin->min_trade_size = $val['MinTradeSize'];
                        $coin->market_name = $val['MarketName'];
                        $coin->is_active = $val['IsActive'];
                        $coin->created_time = $val['Created'];
                        $coin->save();
                    }
                }
            }
            
            $summaries = file_get_contents(Config::get('url.bittrex_api_summaries'));
            $data = json_decode($summaries, true);
            if ($data['success'] === true) {
                foreach ($data['result'] as $key => $val) {
                    $checkCoin = CoinList::where('market_name', $val['MarketName'])->first();
                    if ($checkCoin) {
                        $coin = new Coin();
                        $coin->coin_id = $checkCoin->id;
                        $coin->volume = $val['Volume'];
                        $coin->base_volume = $val['BaseVolume'];
                        $coin->highest_price = $val['High'];
                        $coin->lowest_price = $val['Low'];
                        $coin->open_buy_orders = $val['OpenBuyOrders'];
                        $coin->open_sell_orders = $val['OpenSellOrders'];
                        $coin->prev_day = $val['PrevDay'];
                        $coin->save();
                    }
                }
            }
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
        }
    }
}
