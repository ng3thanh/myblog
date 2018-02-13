<?php
namespace App\Repositories\Personal\Culture\Notes;

use App\Models\Personal\Culture\Notes;
use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class NotesEloquentRepository extends EloquentRepository implements NotesRepositoryInterface
{

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return Notes::class;
    }

    /**
     * @param $userId
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getLastNoteOfUserOrderBy($userId, $orderBy = 'created_at', $sort = 'asc')
    {
        return $this->_model->where('user_id', $userId)->orderBy($orderBy, $sort)->first();
    }

    /**
     * @param $userId
     * @param $paging
     * @param string $sort
     * @param string $orderBy
     * @return mixed
     */
    public function getNoteWithPaginate($userId, $paging, $sort = 'asc', $orderBy = 'created_at'){
        return $this->_model->where('user_id', $userId)->orderBy($orderBy, $sort)->paginate($paging);
    }
}