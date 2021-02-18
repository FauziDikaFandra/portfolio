<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSGoodsReturn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_goods_return', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('branchname');
            $table->string('status');
            $table->string('rt_code');
            $table->date('documentdate');
            $table->date('postingdate');
            $table->string('vendor_code');
            $table->string('remarks');
            $table->string('vendorname');
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
