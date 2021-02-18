<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 's_item_master';
    public $timestamps = false; // biar kolom updated_at & created_at bawaan model tidak di isi
    use HasFactory;
}
