<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // public function indicatorSetting(){
    //     return $this->morphToMany(indicatorSetting::class, 'trading_setting_id');
    // }
    
}
