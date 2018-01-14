<?php
namespace App\Repositories\Coins;

interface CoinsRepositoryInterface
{
    /**
     * Get all coins only actived
     * 
     * @return mixed
     */
    public function getAllCoinActived();

    /**
     * Get coin only actived
     * 
     * @return mixed
     */
    public function findOnlyActived($id);
}