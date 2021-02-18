<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSGoodsReceiptDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_goods_receipt_detail', function (Blueprint $table) {
            $table->id();
            $table->string('gr_code');
            $table->string('article_code');
            $table->string('plu');
            $table->string('description');
            $table->string('long_description');
            $table->string('frgn_description');
            $table->decimal('price');
            $table->string('class');
            $table->string('burui');
            $table->string('dp2');
            $table->string('brand');
            $table->integer('qty');
            $table->string('useradded');
            $table->string('useredited');
            $table->date('dateadded');
            $table->date('dateedited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
