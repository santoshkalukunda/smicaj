<?php

namespace App\Http\Controllers;

use App\Models\TradingSetting;
use App\Http\Requests\StoreTradingSettingRequest;
use App\Http\Requests\UpdateTradingSettingRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TradingSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tradingSettings = new TradingSetting;

        if ($request->has('id')) {
            if ($request->id != null) {
                $tradingSettings = $tradingSettings->where('id', ["$request->id"]);
            }
        }
        if ($request->has('trading')) {
            if ($request->trading != null) {
                $tradingSettings = $tradingSettings->where('trading', ["$request->trading"]);
            }
        }
        if ($request->has('trading_time')) {
            if ($request->trading_time != null) {
                $tradingSettings = $tradingSettings->where('trading_time', ["$request->trading_time"]);
            }
        }
        if ($request->has('buy_sell')) {
            if ($request->buy_sell != null) {
                $tradingSettings = $tradingSettings->where('buy_sell', ["$request->buy_sell"]);
            }
        }
        if ($request->has('user_id')) {
            if ($request->user_id != null) {
                $tradingSettings = $tradingSettings->where('user_id', ["$request->user_id"]);
            }
        }
        $tradingSettings = $tradingSettings->latest()->get();
        return view('backend.trading-setting.index', compact('tradingSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TradingSetting $tradingSetting)
    {
      $response = Http::withHeaders([
            'X-RapidAPI-Key' => '79ed8c18c6msh2579512b15be1c2p19c4d7jsnb3325ddf0951',
            'X-RapidAPI-Host' => 'trading-view.p.rapidapi.com'
        ])->get('https://trading-view.p.rapidapi.com/auto-complete', [
            'text'=> 'tesla', 
            'lang'=> 'en'
        ]);
        $response = $response->json();
        return view('backend.trading-setting.create', compact('tradingSetting','response'));
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
                "slug" => Str::uuid(),
                "name" => $request->name,
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
                "save_image" => $request->save_image ?? false,
            ]);
            foreach ($request->studies as $study) {
                $tradingSetting->indicatorSettings()->create([
                    'value' => $study,
                ]);
            }
            return redirect()->route('trading-settings.edit', $tradingSetting)->with('success', 'Your Setting is Created');
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
        return view('backend.trading-setting.show', compact('tradingSetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TradingSetting  $tradingSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingSetting $tradingSetting)
    {
        return view('backend.trading-setting.create', compact('tradingSetting'));
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
                "name" => $request->name,
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
                "save_image" => $request->save_image ?? false,
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
        return redirect()->back()->with('success', "Trading Seleting Deleted");
    }
}
