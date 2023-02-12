<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutSetting extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function tradingLayout()
    {
        return $this->belongsTo(tradingLayout::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
