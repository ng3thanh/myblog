<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Coins\CoinsEloquentRepository;
use Illuminate\Http\Request;
use App\Repositories\CoinsExchange\CoinsExchangeEloquentRepository;

class DashboardController extends Controller
{

    protected $coinRepository;

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
        $totalCoin = $this->coinRepository->getAll()->count();
        $lowestCoin = $this->coinsExchangeRepository->getLowestChangeRateCoin();
        dd($lowestCoin);
        $highestCoin = $this->coinsExchangeRepository->getHighestChangeRateCoin();

        return view('admin.dashboard')->with('coins', $totalCoin);
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
    public function show($id)
    {
        //
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
