<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Coins extends Model
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
        'market_currency',
        'base_currency',
        'market_currency_long',
        'base_currency_long',
        'min_trade_size',
        'market_name',
        'is_active',
        'created_time'
    ];
    
    /**
     * Get the exchange of one coin.
     */
    public function exchangeOfCoin()
    {
        return $this->hasMany('App\Models\CoinsExchange', 'coin_id');
    }
}
