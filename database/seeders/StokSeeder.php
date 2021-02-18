<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('s_stok')->insert([
            [
                'branch_id' => 'S001', 'plu' => '1000000100001', 'article_code' => '10000001', 'date' => '2020/10/01', 'first_stok' => 10, 'sales' => 0, 'refund' => 0, 'retur' => 0, 'receipt_po' => 0, 'receipt' => 0, 'issue' => 0, 'transferIn' => 0, 'TransferOut' => 0, 'last_stok' => 10
            ],
            [
                'branch_id' => 'S001', 'plu' => '1000000200002', 'article_code' => '10000002', 'date' => '2020/10/01', 'first_stok' => 10, 'sales' => 0, 'refund' => 0, 'retur' => 0, 'receipt_po' => 0, 'receipt' => 0, 'issue' => 0, 'transferIn' => 0, 'TransferOut' => 0, 'last_stok' => 10
            ],
            [
                'branch_id' => 'S001', 'plu' => '1000000300003', 'article_code' => '10000003', 'date' => '2020/10/01', 'first_stok' => 5, 'sales' => 0, 'refund' => 0, 'retur' => 0, 'receipt_po' => 0, 'receipt' => 0, 'issue' => 0, 'transferIn' => 0, 'TransferOut' => 0, 'last_stok' => 5
            ],
            [
                'branch_id' => 'S001', 'plu' => '1000000400004', 'article_code' => '10000004', 'date' => '2020/10/01', 'first_stok' => 5, 'sales' => 0, 'refund' => 0, 'retur' => 0, 'receipt_po' => 0, 'receipt' => 0, 'issue' => 0, 'transferIn' => 0, 'TransferOut' => 0, 'last_stok' => 5
            ]
        ]);
    }
}
