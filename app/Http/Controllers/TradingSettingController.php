<?php

namespace App\Http\Controllers;

use App\Models\TradingSetting;
use App\Http\Requests\StoreTradingSettingRequest;
use App\Http\Requests\UpdateTradingSettingRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TradingSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.trading-setting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.trading-setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTradingSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTradingSettingRequest $request)
    {

    //    return $request->studies;
        // return $request->validated();
        $user = User::findOrFail(Auth::user()->id);
        $tradingSetting = $user->tradingSetting()->create($request->validated());


        foreach ($request->studies as $study) {
            $tradingSetting->indicatorSettings()->create([
                'value' => $study,
            ]);
        }
        return redirect()->back()->with('success', 'Your Setting is Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function show(TradingSetting $tradingSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingSetting $tradingSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTradingSettingRequest  $request
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTradingSettingRequest $request, TradingSetting $tradingSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradingSetting $tradingSetting)
    {
        //
    }
}
