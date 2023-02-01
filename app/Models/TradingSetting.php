<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingSetting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function indicatorSettings(){
        return $this->hasMany(indicatorSetting::class, 'trading_setting_id');
    }
}
