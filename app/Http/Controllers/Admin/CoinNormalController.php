<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Coins\CoinsEloquentRepository;
use App\Repositories\CoinsExchange\CoinsExchangeEloquentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class CoinNormalController extends Controller
{

    protected $coinRepository;

    protected $coinsExchangeRepository;

    public function __construct(CoinsEloquentRepository $coinRepository, CoinsExchangeEloquentRepository $coinsExchangeRepository)
    {
        $this->coinRepository = $coinRepository;
        $this->coinsExchangeRepository = $coinsExchangeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->coinsExchangeRepository->getCoinExchangeInLastTime();
        return view('admin.coin.normal.normal', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function show($coinName)
    {
        $realData = file_get_contents(Config::get('url.bittrex_api') . 'getticker?market=BTC-' . $coinName);
        
        $detailData = $this->coinsExchangeRepository->getDetailCoinExchange($coinName, 'BTC', 14);
        
        $highest = [];
        $lowest = [];
        
        foreach ($detailData as $key => $item) {
            $highest[$key] = [0 => date('Y-m-d', strtotime($item->created_at)), 1 => $item->highest_price];
            $lowest[$key] = [0 => date('Y-m-d', strtotime($item->created_at)), 1 => $item->lowest_price];
        }

        return view('admin.coin.normal.detail', [
            'coin' => $coinName,
            'data' => $realData,
            'detailData' => $detailData,
            'lowest' => json_encode($lowest),
            'highest' => json_encode($highest)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id            
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
