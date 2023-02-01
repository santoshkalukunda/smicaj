<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTradingSettingRequest extends FormRequest
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
            "trading" => "required",
            "trading_time" => "required",
            "buy_sell" => "required",
            "interval" => "required",
            "studies" => "required",
            "style" => "nullable",
            "theme" => "nullable",
            "timezone" => "nullable",
            "locale" => "nullable",
            "range" => "nullable",
            "width" => "required",
            "height" => "required",
            "hide_top_toolbar" => "nullable|boolean",
            "withdateranges" => "nullable|boolean",
            "hide_side_toolbar" => "nullable|boolean",
            "details" => "nullable|boolean",
            "calendar" => "nullable|boolean",
            "hotlist" => "nullable|boolean",
            "enable_publishing" => "nullable|boolean",
            "allow_symbol_change" => "nullable|boolean",
            "save_image" => "nullable|boolean",
        ];
    }
}
