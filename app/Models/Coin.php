<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coin extends Model
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coin_id',
        'volume',
        'base_volume',
        'highest_price',
        'lowest_price',
        'open_buy_orders',
        'open_sell_orders',
        'prev_day'
    ];
}
