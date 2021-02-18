<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_vendor')->insert([
            ['vendor_code' => '20000', 'name' => 'levis - vendor'],
            ['vendor_code' => '20001', 'name' => 'loreal - vendor']
        ]);
    }
}
