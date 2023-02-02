<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Support\Str;

class TradingSetting extends Model
{
    use HasFactory;
    // use HasSlug;

    protected $guarded = ['id'];

    // public function getSlugOptions() : SlugOptions
    // {
    //     return SlugOptions::create()
    //         ->generateSlugsFrom(['trading','trading_time','buy_sell'])
    //         ->saveSlugsTo('slug')
    //         ->doNotGenerateSlugsOnUpdate();
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function indicatorSettings()
    {
        return $this->hasMany(indicatorSetting::class, 'trading_setting_id');
    }

    // public function getBuySellAttribute()
    // {
    //     if ($this->attributes['buy_sell'] == true) {
    //         return 'true';
    //     } else {
    //         return 'false';
    //     }
    // }
    // public function getEnablePublishingAttribute()
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
