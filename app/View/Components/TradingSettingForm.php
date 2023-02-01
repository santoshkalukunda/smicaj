<?php

namespace App\View\Components;

use App\Models\Indicator;
use Illuminate\View\Component;

class TradingSettingForm extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $indicatores = Indicator::get();
        return view('components.trading-setting-form', compact('indicatores'));
    }
}
