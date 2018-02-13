<?php
namespace App\Repositories\Personal\Culture\Notes;

interface NotesRepositoryInterface
{
    /**
     * @param $userId
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getLastNoteOfUserOrderBy($userId, $orderBy = 'created_at', $sort = 'asc');

    /**
     * @param $userId
     * @param $paging
     * @param string $sort
     * @param string $orderBy
     * @return mixed
     */
    public function getNoteWithPaginate($userId, $paging, $sort = 'asc', $orderBy = 'created_at');
}