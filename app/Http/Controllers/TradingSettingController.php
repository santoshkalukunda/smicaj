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
        $tradingSettings = TradingSetting::get();
        return view('backend.trading-setting.index',compact('tradingSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TradingSetting $tradingSetting)
    {
        return view('backend.trading-setting.create',compact('tradingSetting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTradingSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTradingSettingRequest $request)
    {
        try {
            $user = User::findOrFail(Auth::user()->id);
            $tradingSetting = $user->tradingSetting()->create([
                "trading" => $request->trading,
                "trading_time" => $request->trading_time,
                "buy_sell" => $request->buy_sell,
                "interval" => $request->interval,
                "style" => $request->style ?? false,
                "theme" => $request->theme,
                "timezone" => $request->timezone,
                "locale" => $request->locale,
                "range" => $request->range,
                "width" => $request->width,
                "height" => $request->height,
                "hide_top_toolbar" => $request->hide_top_toolbar ?? false,
                "withdateranges" => $request->withdateranges ?? false,
                "hide_side_toolbar" => $request->hide_side_toolbar ?? false,
                "details" => $request->details ?? false,
                "calendar" => $request->calendar ?? false,
                "hotlist" => $request->hotlist ?? false,
                "enable_publishing" => $request->enable_publishing ?? false,
                "allow_symbol_change" => $request->allow_symbol_change ?? false,
                "save_image" => $request->save_image?? false,
            ]);
            foreach ($request->studies as $study) {
                $tradingSetting->indicatorSettings()->create([
                    'value' => $study,
                ]);
            }
            return redirect()->route('trading-settings.edit',$tradingSetting)->with('success', 'Your Setting is Created');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function show(TradingSetting $tradingSetting)
    {
        return view('backend.trading-setting.show',compact('tradingSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingSetting $tradingSetting)
    {
        return view('backend.trading-setting.create',compact('tradingSetting'));
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
       
        try {
            //code...
            $tradingSetting->update([
                "trading" => $request->trading,
                "trading_time" => $request->trading_time,
                "buy_sell" => $request->buy_sell,
                "interval" => $request->interval,
                "style" => $request->style ?? false,
                "theme" => $request->theme,
                "timezone" => $request->timezone,
                "locale" => $request->locale,
                "range" => $request->range,
                "width" => $request->width,
                "height" => $request->height,
                "hide_top_toolbar" => $request->hide_top_toolbar ?? false,
                "withdateranges" => $request->withdateranges ?? false,
                "hide_side_toolbar" => $request->hide_side_toolbar ?? false,
                "details" => $request->details ?? false,
                "calendar" => $request->calendar ?? false,
                "hotlist" => $request->hotlist ?? false,
                "enable_publishing" => $request->enable_publishing ?? false,
                "allow_symbol_change" => $request->allow_symbol_change ?? false,
                "save_image" => $request->save_image?? false,
            ]);
            $tradingSetting->indicatorSettings()->delete();
            foreach ($request->studies as $study) {
                $tradingSetting->indicatorSettings()->create([
                    'value' => $study,
                ]);
            }
            return redirect()->back()->with('success', 'Your Setting is Updated');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(TradingSetting $tradingSetting)
    {
        $tradingSetting->delete();
        return redirect()->back()->with('success',"Trading Seleting Deleted");
    }
}
