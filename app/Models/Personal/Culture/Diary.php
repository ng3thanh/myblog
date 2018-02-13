<?php

namespace App\Models\Personal\Culture;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Diary extends Model
{
    const ENABLE = 1;
    const DISABLE = 0;

    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_culture_diaries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'content',
        'emotions',
        'weather',
        'status'
    ];
}
