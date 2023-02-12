<?php

namespace Database\Seeders;

use App\Models\LayoutView;
use Illuminate\Database\Seeder;

class layoutViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layoutViews = [
            [
                'trading_layout_id' => '1',
                'name' => 'View 1',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '2',
                'name' => 'View 1',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '2',
                'name' => 'View 2',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View 1',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View 2',
                'height' => '600',
                'width' => '300',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View 3',
                'height' => '600',
                'width' => '300',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View 1',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View 2',
                'height' => '300',
                'width' => '150',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View 3',
                'height' => '300',
                'width' => '150',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View 4',
                'height' => '300',
                'width' => '150',
            ],
        ];
        foreach ($layoutViews as $layoutView){
            LayoutView::create($layoutView);
        }
    }
}
