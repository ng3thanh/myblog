<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CoinsExchange extends Model
{
    // Constant of coins exchange
    const CHANGE_RATE_TINY = 5;
    const CHANGE_RATE_LOW = 10;
    const CHANGE_RATE_NORMAL = 15;
    const CHANGE_RATE_BASIC = 20;
    const CHANGE_RATE_MEDIUM = 25;
    const CHANGE_RATE_HIGH = 30;
    const CHANGE_RATE_HARD = 35;
    const CHANGE_RATE_SUPER = 40;
    
    // Set up show coin exchange in 7 days
    const SHOW_DATA_OF_NUMBER_DAYS = 7;
    
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'coins_exchange';

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
    
    /**
     * Get the coin of one exchange.
     */
    public function coinOfExchange()
    {
        return $this->belongsTo('App\Models\Coins', 'coin_id');
    }
}
