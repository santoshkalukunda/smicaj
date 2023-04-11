<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'trading' => 'required',
            'trading_time' => 'required',
            'buy_sell' => 'required',
            'macd_enable' => 'nullable',
            'macd_source' => 'nullable',
            'macd_fast_length' => 'nullable',
            'macd_fast_width' => 'nullable',
            'macd_fast_line_color' => 'nullable',
            'macd_slow_length' => 'nullable',
            'macd_slow_width' => 'nullable',
            'macd_slow_line_color' => 'nullable',
            'macd_histogram' => 'nullable',
            'macd_histogram_up_color' => 'nullable',
            'histogram_down_color' => 'nullable',
            'rsi_enable' => 'nullable',
            'rsi_source' => 'nullable',
            'rsi_length' => 'nullable',
            'rsi_width' => 'nullable',
            'rsi_color' => 'nullable',
            'ema_enable' => 'nullable',
            'ema_source' => 'nullable',
            'ema_length' => 'nullable',
            'ema_width' => 'nullable',
            'ema_color' => 'nullable',
            'sma_enable' => 'nullable',
            'sma_source' => 'nullable',
            'sma_length' => 'nullable',
            'sma_width' => 'nullable',
            'sma_color' => 'nullable',
        ];
    }
}
