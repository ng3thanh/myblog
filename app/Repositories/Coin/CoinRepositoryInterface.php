<?php
namespace App\Repositories\Coin;

interface CoinRepositoryInterface
{
        /**
     * Get all posts only published
     * @return mixed
     */
    public function getAllCoinActived();

    /**
     * Get post only published
     * @return mixed
     */
    public function findOnlyActived($id);
}