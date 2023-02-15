<?php

namespace App\Http\Controllers;

use App\Models\LayoutSetting;
use App\Http\Requests\StoreLayoutSettingRequest;
use App\Http\Requests\UpdateLayoutSettingRequest;
use App\Models\TradingLayout;
use App\Models\TradingSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class LayoutSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tradingLayouts = TradingLayout::with('layoutViews')->get();
        return view('backend.layout-setting.index', compact('tradingLayouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TradingLayout $tradingLayout, LayoutSetting $layoutSetting)
    {
        $layoutSetting = $tradingLayout->layoutSettings()->first();
        // return $layoutSetting;
        if ($layoutSetting) {
            return redirect()->route('layout-settings.show',[$tradingLayout, $layoutSetting]);
        } else {
            $layoutViews = $tradingLayout->layoutViews()->get();
            $tradingSettings = TradingSetting::get();
            // return TradingLayout::where('layout',$request->layout)->get();
            return view('backend.layout-setting.create', compact('tradingLayout', 'layoutViews', 'tradingSettings', 'layoutSetting'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLayoutSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLayoutSettingRequest $request, TradingLayout $tradingLayout)
    {
        $layoutSetting = $tradingLayout->layoutSettings()->create([
            'View_1' => $request->View_1,
            'View_2' => $request->View_2,
            'View_3' => $request->View_3,
            'View_4' => $request->View_4,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()
            ->route('layout-settings.edit', [$tradingLayout, $layoutSetting])
            ->with('success', 'Layout Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LayoutSetting  $layoutSetting
     * @return \Illuminate\Http\Response
     */
    public function show(TradingLayout $tradingLayout, LayoutSetting $layoutSetting)
    {
        $layoutViews = $tradingLayout->layoutViews()->get();
        $tradingSettings = TradingSetting::get();
        return view('backend.layout-setting.show', compact('tradingLayout', 'layoutViews', 'tradingSettings', 'layoutSetting'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LayoutSetting  $layoutSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TradingLayout $tradingLayout, LayoutSetting $layoutSetting)
    {
        $layoutViews = $tradingLayout->layoutViews()->get();
        $tradingSettings = TradingSetting::get();
        // return TradingLayout::where('layout',$request->layout)->get();
        return view('backend.layout-setting.create', compact('tradingLayout', 'layoutViews', 'tradingSettings', 'layoutSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLayoutSettingRequest  $request
     * @param  \App\Models\LayoutSetting  $layoutSetting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLayoutSettingRequest $request, LayoutSetting $layoutSetting)
    {
        $layoutSetting = $layoutSetting->update([
            'View_1' => $request->View_1,
            'View_2' => $request->View_2,
            'View_3' => $request->View_3,
            'View_4' => $request->View_4,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()
            ->back()
            ->with('success', 'Layout Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LayoutSetting  $layoutSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(LayoutSetting $layoutSetting)
    {
        //
    }
}
