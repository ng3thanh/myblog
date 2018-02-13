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
            ->leftJoin('setting_icons as icon_emotion', function ($join) {
                $join->on('icon_emotion.id', '=', 'personal_culture_diaries.emotion')
                     ->where('icon_emotion.type', Icons::EMOTION_TYPE);
            })
            ->leftJoin('setting_icons as icon_weather', function ($join) {
                $join->on('icon_weather.id', '=', 'personal_culture_diaries.weather')
                     ->where('icon_weather.type', Icons::WEATHER_TYPE);
            })
            ->where('personal_culture_diaries.user_id', $userId)
            ->orderBy('personal_culture_diaries.'.$orderBy, $sort)
            ->select(
                'personal_culture_diaries.title'
                , 'personal_culture_diaries.description'
                , 'personal_culture_diaries.content'
                , 'personal_culture_diaries.status'
                , 'icon_emotion.icon as emotion_icon'
                , 'icon_emotion.name as emotion_name'
                , 'icon_weather.icon as weather_icon'
                , 'icon_weather.name as weather_name'
            )
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

    /**
     * @param $id
     * @return mixed
     */
    public function getDiaryDetail($id) {
        return $this->_model
            ->leftJoin('setting_icons as icon_emotion', function ($join) {
                $join->on('icon_emotion.id', '=', 'personal_culture_diaries.emotion')
                    ->where('icon_emotion.type', Icons::EMOTION_TYPE);
            })
            ->leftJoin('setting_icons as icon_weather', function ($join) {
                $join->on('icon_weather.id', '=', 'personal_culture_diaries.weather')
                    ->where('icon_weather.type', Icons::WEATHER_TYPE);
            })
            ->where('personal_culture_diaries.id', $id)
            ->select(
                'personal_culture_diaries.title'
                , 'personal_culture_diaries.description'
                , 'personal_culture_diaries.content'
                , 'personal_culture_diaries.status'
                , 'icon_emotion.icon as emotion_icon'
                , 'icon_emotion.name as emotion_name'
                , 'icon_weather.icon as weather_icon'
                , 'icon_weather.name as weather_name'
            )
            ->firstOrFail();
    }
}