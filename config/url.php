<?php

/*
 * |--------------------------------------------------------------------------
 * | Bittrex API
 * |--------------------------------------------------------------------------
 * |
 * | This link url of Bittrex API.
 * |
 */
$bittrex_api = 'https://bittrex.com/api/v1.1/public/';

return [
    
    /*
     * |--------------------------------------------------------------------------
     * | Bittrex Market
     * |--------------------------------------------------------------------------
     * |
     * | This link url of Bittrex markets, which we want to get data everyday.
     * |
     */
    
    'bittrex_api'           => $bittrex_api,
    'bittrex_api_market'    => $bittrex_api . 'getmarkets',
    'bittrex_api_summaries' => $bittrex_api . 'getmarketsummaries'

];