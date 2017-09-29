<?php
namespace App\Repositories\CoinsExchange;

interface CoinsExchangeRepositoryInterface
{
    /**
     * Get 5 coins have rate of change lowest in 7 days
     *
     * @return mixed
     */
    public function getLowestChangeRate();

}