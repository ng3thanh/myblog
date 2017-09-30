<?php
namespace App\Repositories\CoinsExchange;

use App\Models\CoinsExchange;
use App\Repositories\EloquentRepository;
use App\Helpers\Date\DateHelper;

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
     * Get 5 coins have the lowest rate of change in 7 days
     *
     * @return mixed
     */
    public function getLowestChangeRateCoin()
    {
        $dayAgo = DateHelper::getDateInManyDaysAgo('Y-m-d 00:00:00', 7);

        $result = $this->_model->where('created_at', '>', $dayAgo)->get();
        
        return $result;
    }

    /**
     * Get 5 coins have the highest rate of change in 7 days
     *
     * @return mixed
     */
    
    public function getHighestChangeRateCoin()
    {
        
    }
}