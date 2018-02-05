<?php

namespace App\Models\Personal\Culture;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    const SHOW = 1;
    const DISABLE = 0;

    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_culture_notes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'status'
    ];
}