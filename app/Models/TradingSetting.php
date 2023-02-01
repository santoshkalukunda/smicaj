<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingSetting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function indicatorSettings(){
        return $this->hasMany(indicatorSetting::class, 'trading_setting_id');
    }
    // public function getBuy_sellAttribute()
    // {
    //     if ($this->attributes['buy_sell'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }
    // public function getEnable_publishingAttribute()
    // {
    //     if ($this->attributes['enable_publishing'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }
    // // public function getWithdaterangesAttribute()
    // // {
    // //     if ($this->attributes['withdateranges'] == true) {
    // //         return 'true';
    // //     } else {
    // //         return 'false';
    // //     }
    // // }
    // public function getHide_side_toolbarAttribute()
    // {
    //     if ($this->attributes['hide_side_toolbar'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }

    // public function getAllow_symbol_changeAttribute()
    // {
    //     if ($this->attributes['allow_symbol_change'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }
    // public function getSave_imageAttribute()
    // {
    //     if ($this->attributes['save_image'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }

    // // public function getDetailsAttribute()
    // // {
    // //     if ($this->attributes['details'] == true) {
    // //         return 'true';
    // //     } else {
    // //         return 'false';
    // //     }
    // // }
    // public function getHotlistAttribute()
    // {
    //     if ($this->attributes['hotlist'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }
    // // public function getcalendarAttribute()
    // // {
    // //     if ($this->attributes['calendar'] == true) {
    // //         return 'true';
    // //     } else {
    // //         return 'false';
    // //     }
    // // }

}
