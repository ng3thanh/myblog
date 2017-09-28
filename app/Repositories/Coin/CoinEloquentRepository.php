<?php
namespace App\Repositories\Coin;

use App\Repositories\EloquentRepository;
use App\Models\CoinList;

class CoinEloquentRepository extends EloquentRepository implements CoinRepositoryInterface
{

    /**
     * get model
     *
     * @return string
     */
    public function getModel()
    {
        return CoinList::class;
    }

    /**
     * Get all coin
     *
     * @return mixed
     */
    public function getAllCoinActived()
    {
        $result = $this->_model->where('is_active', 1)->get();
        
        return $result;
    }

    /**
     * Get post only published
     *
     * @param $id 
     * @return mixed
     */
    public function findOnlyActived($id)
    {
        $result = $this->_model->where('id', $id)
            ->where('is_active', 1)
            ->first();
        
        return $result;
    }
}