<?php

namespace App\Http\Controllers;

use App\Models\TradingLayout;
use App\Http\Requests\StoreTradingLayoutRequest;
use App\Http\Requests\UpdateTradingLayoutRequest;

class TradingLayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreTradingLayoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTradingLayoutRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TradingLayout  $tradingLayout
     * @return \Illuminate\Http\Response
     */
    public function show(TradingLayout $tradingLayout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradingLayout  $tradingLayout
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingLayout $tradingLayout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTradingLayoutRequest  $request
     * @param  \App\Models\TradingLayout  $tradingLayout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTradingLayoutRequest $request, TradingLayout $tradingLayout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradingLayout  $tradingLayout
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradingLayout $tradingLayout)
    {
        //
    }
}
