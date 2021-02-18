<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class GoodsReturnDetails extends Model
{

    protected $table = 's_goods_return_detail'; //menghubungkan ke table s_goods_return manual
    protected $primaryKey = ['rt_code', 'article_code']; //menghubungkan primary key nya s_goods_return manual
    public $incrementing = false; //untuk menangani masalah multiple primaryKey
    public $timestamps = false; // biar kolom updated_at & created_at bawaan model tidak di isi

    use HasFactory;
}
