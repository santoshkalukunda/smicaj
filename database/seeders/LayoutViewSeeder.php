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
                'name' => 'View_1',
                'height' => '1200',
                'width' => '700',
            ],
            [
                'trading_layout_id' => '2',
                'name' => 'View_1',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '2',
                'name' => 'View_2',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View_1',
                'height' => '800',
                'width' => '600',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View_2',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '3',
                'name' => 'View_3',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View_1',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View_2',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View_3',
                'height' => '600',
                'width' => '500',
            ],
            [
                'trading_layout_id' => '4',
                'name' => 'View_4',
                'height' => '600',
                'width' => '500',
            ],
        ];
        foreach ($layoutViews as $layoutView){
            LayoutView::create($layoutView);
        }
    }
}
