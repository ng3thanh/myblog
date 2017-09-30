<?php
namespace App\Repositories\CoinsExchange;

interface CoinsExchangeRepositoryInterface
{
    /**
     * Get 5 coins have the lowest rate of change in 7 days
     *
     * @return mixed
     */
    public function getLowestChangeRateCoin();
    
    /**
     * Get 5 coins have the highest rate of change in 7 days
     *
     * @return mixed
     */
    public function getHighestChangeRateCoin();
    

}