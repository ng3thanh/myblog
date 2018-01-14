<?php
namespace App\Repositories\Coins;

use App\Models\Coins;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class CoinsEloquentRepository extends EloquentRepository implements CoinsRepositoryInterface
{

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return Coins::class;
    }

    /**
     * Get all coins
     *
     * @return mixed
     */
    public function getAllCoinActived()
    {
        $result = $this->_model->where('is_active', 1)->get();
        
        return $result;
    }

    /**
     * Get coin only actived
     *
     * @param
     *            $id
     * @return mixed
     */
    public function findOnlyActived($id)
    {
        $result = $this->_model->where('id', $id)->where('is_active', 1)->first();
        
        return $result;
    }
}