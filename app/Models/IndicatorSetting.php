<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicatorSetting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tradingSetting(){
        return $this->belongsTo(TradingSetting::class);
    }

}
