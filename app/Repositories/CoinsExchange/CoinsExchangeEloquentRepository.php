<?php
namespace App\Repositories\CoinsExchange;

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
     * Get 5 coins have rate of change lowest in 7 days
     *
     * @return mixed
     */
    public function getLowestChangeRate()
    {
        $dayAgo = date('Y-m-d 00:00:00', strtotime('-7 days', time()));
        $result = $this->_model->where('created_at', '>', $dayAgo)->get();
        
        return $result;
    }
}