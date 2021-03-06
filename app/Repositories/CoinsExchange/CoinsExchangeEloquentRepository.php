<?php
namespace App\Repositories\CoinsExchange;

use App\Helpers\Date\DateHelper;
use App\Models\CoinsExchange;
use App\Repositories\EloquentRepository;

class CoinsExchangeEloquentRepository extends EloquentRepository implements CoinsExchangeRepositoryInterface
{

    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return CoinsExchange::class;
    }

    /**
     * Group coin ecchange in 7 days
     *
     * @return mixed
     */
    protected function groupCoinExchangeQuery()
    {
        $dayAgo = DateHelper::getDateInManyDaysAgo('Y-m-d 00:00:00', CoinsExchange::SHOW_DATA_OF_NUMBER_DAYS);

        $result = $this->_model->join('coins', 'coins.id', '=', 'coins_exchange.coin_id')
            ->where('coins.base_currency', '=', 'BTC')
            ->where('coins.market_currency', '!=', 'ETH')
            ->where('coins_exchange.created_at', '>', $dayAgo)
            ->selectRaw('market_currency as coin_name,
                         coin_id as coin_id, 
                         (highest_price - lowest_price)*100/lowest_price as change_rate, 
                         highest_price as highest_price,
                         lowest_price as lowest_price,
                         prev_day as prev_day, 
                         coins_exchange.created_at as created_at')
            ->orderBy('created_at');

        return $result;
    }

    /**
     * Get 5 coins have the lowest rate of change in 7 days
     *
     * @return array
     */
    public function getLowestChangeRateCoin()
    {
        $query = $this->groupCoinExchangeQuery();
        $results = $query->having('change_rate', '<', CoinsExchange::CHANGE_RATE_LOW)->get()->toArray();
        
        $data = array();
        
        foreach ($results as $key => $item) {
            $data[$item['coin_name']][$key] = $item;
        }
        
        // DEMO (Get 7-4) NORMAL = 7 - 7
        foreach ($data as $key => $value) {
            if (count($value) < CoinsExchange::SHOW_DATA_OF_NUMBER_DAYS) {
                unset($data[$key]);
            }
        }
        
        return $data;
    }

    /**
     * Get 5 coins have the highest rate of change in 7 days
     *
     * @return mixed
     */
    public function getHighestChangeRateCoin()
    {
        $query = $this->groupCoinExchangeQuery();
        $results = $query->having('change_rate', '>', CoinsExchange::CHANGE_RATE_MEDIUM)->get()->toArray();
        
        $data = array();
        
        foreach ($results as $key => $item) {
            $data[$item['coin_name']][$key] = $item;
        }

        foreach ($data as $key => $value) {
            if (count($value) < CoinsExchange::SHOW_DATA_OF_NUMBER_DAYS) {
                unset($data[$key]);
            }
        }
        
        return $data;
    }
    
    public function getCoinExchangeInLastTime()
    {
        $oneDay = DateHelper::getDateInManyDaysAgo('Y-m-d H:i:s', 1);

        $result = $this->_model->join('coins', 'coins.id', '=', 'coins_exchange.coin_id')
            ->where('coins.base_currency', '=', 'BTC')
            ->where('coins.market_currency', '!=', 'ETH')
            ->where('coins_exchange.created_at', '>', $oneDay)
            ->selectRaw('market_currency as coin_name,
                         coin_id as coin_id,
                         (highest_price - lowest_price)*100/lowest_price as change_rate,
                         base_volume as base_volume,
                         open_buy_orders as open_buy_orders,
                         open_sell_orders as open_sell_orders,
                         prev_day as prev_day,
                         highest_price as highest_price,
                         lowest_price as lowest_price')
            ->get();
        return $result;
    }
    
    public function getDetailCoinExchange($coinName, $marketName, $days)
    {
        $dayAgo = DateHelper::getDateInManyDaysAgo('Y-m-d 00:00:00', $days);
        
        $result = $this->_model->join('coins', 'coins.id', '=', 'coins_exchange.coin_id')
        ->where('coins.base_currency', '=', $marketName)
        ->where('coins.market_currency', '=', $coinName)
        ->where('coins_exchange.created_at', '>', $dayAgo)
        ->selectRaw('market_currency as coin_name,
                     coin_id as coin_id,
                     (highest_price - lowest_price)*100/lowest_price as change_rate,
                     base_volume as base_volume,
                     open_buy_orders as open_buy_orders,
                     open_sell_orders as open_sell_orders,
                     prev_day as prev_day,
                     highest_price as highest_price,
                     lowest_price as lowest_price,
                     coins_exchange.created_at as created_at')
         ->orderBy('coins_exchange.created_at')
         ->get();
                         
         return $result;
        
    }
}