<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class GoodsReturn extends Model
{

    protected $table = 's_goods_return'; //menghubungkan ke table s_goods_return manual
    protected $primaryKey = ['rt_code', 'branch_id']; //menghubungkan primary key nya s_goods_return manual
    public $incrementing = false; //untuk menangani masalah multiple primaryKey
    public $timestamps = false; // biar kolom updated_at & created_at bawaan model tidak di isi

    use HasFactory;
}
