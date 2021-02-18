<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_item_master')->insert([
            [
                'plu' => '1000000100001', 'article_code' => '10000001', 'burui' => 'MCACALVS1', 'brand' => 'levis', 'description' => 'levis', 'long_description' => 'celana levis', 'frgn_description' => 'celana levis', 'price' => 100000, 'class' => 'LVS', 'dp2' => 'MD'
            ],
            [
                'plu' => '1000000200002', 'article_code' => '10000002', 'burui' => 'MCACALVS1', 'brand' => 'levis', 'description' => 'levis', 'long_description' => 'jaket levis', 'frgn_description' => 'jaket levis', 'price' => 150000, 'class' => 'LVS', 'dp2' => 'MD'
            ],
            [
                'plu' => '1000000300003', 'article_code' => '10000003', 'burui' => 'LCACALVS1', 'brand' => 'loreal', 'description' => 'loreal', 'long_description' => 'lips loreal', 'frgn_description' => 'lips loreal', 'price' => 50000, 'class' => 'LOR', 'dp2' => 'LA'
            ],
            [
                'plu' => '1000000400004', 'article_code' => '10000004', 'burui' => 'LCACALVS1', 'brand' => 'loreal', 'description' => 'loreal', 'long_description' => 'eyes shadow loreal', 'frgn_description' => 'eyes shadow loreal', 'price' => 75000, 'class' => 'LOR', 'dp2' => 'LA'
            ]
        ]);
    }
}
