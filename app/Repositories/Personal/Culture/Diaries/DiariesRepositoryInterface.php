<?php
namespace App\Repositories\Personal\Culture\Diaries;

interface DiariesRepositoryInterface
{
    /**
     * @param $userId
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getLastDiaryOfUserOrderBy($userId, $orderBy = 'created_at', $sort = 'asc');

    /**
     * @param $userId
     * @param $paging
     * @param string $sort
     * @param string $orderBy
     * @return mixed
     */
    public function getDiaryWithPaginate($userId, $paging, $sort = 'asc', $orderBy = 'created_at');

    /**
     * @param $id
     * @return mixed
     */
    public function getDiaryDetail($id);
}