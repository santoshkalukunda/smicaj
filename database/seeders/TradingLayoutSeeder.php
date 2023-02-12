<?php

namespace Database\Seeders;

use App\Models\TradingLayout;
use Illuminate\Database\Seeder;

class TradingLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layouts = [
            [
                'name' => 'layout 1',
                'view' => '1',
            ],
            [
                'name' => 'layout 2',
                'view' => '2',
            ],
            [
                'name' => 'layout 3',
                'view' => '3',
            ],
            [
                'name' => 'layout 4',
                'view' => '4',
            ],
        ];
        foreach ($layouts as $layout){
            TradingLayout::create($layout);
        }
    }
}
