<?php

namespace App\Repositories\Personal\Culture\Diaries;

use App\Models\Personal\Culture\Diary;
use App\Models\Setting\Icons;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class DiariesEloquentRepository extends EloquentRepository implements DiariesRepositoryInterface
{

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return Diary::class;
    }

    /**
     * @param $userId
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getLastDiaryOfUserOrderBy($userId, $orderBy = 'created_at', $sort = 'asc')
    {
        return $this->_model
            ->leftJoin('setting_icons', function ($join) {
                $join->on('setting_icons.id', '=', 'personal_culture_diaries.emotion')
                     ->where('setting_icons.type', Icons::EMOTION_TYPE);
            })
            ->leftJoin('setting_icons', function ($join) {
                $join->on('setting_icons.id', '=', 'personal_culture_diaries.weather')
                     ->where('setting_icons.type', Icons::WEATHER_TYPE);
            })
            ->where('diaries.user_id', $userId)
            ->orderBy($orderBy, $sort)
            ->first();
    }

    /**
     * @param $userId
     * @param $paging
     * @param string $sort
     * @param string $orderBy
     * @return mixed
     */
    public function getDiaryWithPaginate($userId, $paging, $sort = 'asc', $orderBy = 'created_at')
    {
        return $this->_model->where('user_id', $userId)->orderBy($orderBy, $sort)->paginate($paging);
    }
}