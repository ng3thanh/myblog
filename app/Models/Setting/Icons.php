<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Icons extends Model
{
    const EMOTION_TYPE = 0;
    const WEATHER_TYPE = 1;

    use Notifiable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'setting_icons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon',
        'name',
        'type'
    ];
}
