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
}