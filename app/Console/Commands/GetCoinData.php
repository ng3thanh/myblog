<?php
namespace App\Console\Commands;

use App\Models\Coins;
use App\Models\CoinsExchange;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use Exception;
use App\Repositories\Coins\CoinsEloquentRepository;
use App\Repositories\CoinsExchange\CoinsExchangeEloquentRepository;

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
    public function __construct(CoinsEloquentRepository $coinRepository, CoinsExchangeEloquentRepository $coinExchangeRepository)
    {
        parent::__construct();
        $this->coinRepository = $coinRepository;
        $this->coinExchangeRepository = $coinExchangeRepository;
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
                    $checkExists = Coins::where('market_name', $val['MarketName'])->first();
                    if (! $checkExists) {
                        $attributes = [
                            'market_currency'       => $val['MarketCurrency'],
                            'base_currency'         => $val['BaseCurrency'],
                            'market_currency_long'  => $val['MarketCurrencyLong'],
                            'base_currency_long'    => $val['BaseCurrencyLong'],
                            'min_trade_size'        => $val['MinTradeSize'],
                            'market_name'           => $val['MarketName'],
                            'is_active'             => $val['IsActive'],
                            'created_time'          => $val['Created'],
                        ];

                        $this->coinRepository->create($attributes);
                    }
                }
            }
            
            $summaries = file_get_contents(Config::get('url.bittrex_api_summaries'));
            $data = json_decode($summaries, true);
            if ($data['success'] === true) {
                foreach ($data['result'] as $key => $val) {
                    $checkCoin = Coins::where('market_name', $val['MarketName'])->first();
                    if ($checkCoin) {
                        $attributes = [
                            'coin_id'           => $checkCoin->id,
                            'volume'            => $val['Volume'],
                            'base_volume'       => $val['BaseVolume'],
                            'highest_price'     => $val['High'],
                            'lowest_price'      => $val['Low'],
                            'open_buy_orders'   => $val['OpenBuyOrders'],
                            'open_sell_orders'  => $val['OpenSellOrders'],
                            'prev_day'          => $val['PrevDay']
                        ];
                        
                        $this->coinExchangeRepository->create($attributes);
                    }
                }
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
