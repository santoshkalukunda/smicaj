<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class TradingLayout extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = ['id'];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['name'])
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function layoutViews()
    {
        return $this->hasMany(LayoutView::class, 'trading_layout_id');
    }

    public function layoutSettings()
    {
        return $this->hasMany(LayoutSetting::class, 'trading_layout_id');
    }
}
