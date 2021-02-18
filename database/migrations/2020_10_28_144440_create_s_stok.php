<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSStok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_stok', function (Blueprint $table) {
            $table->id();
            $table->string('branch_id');
            $table->string('plu');
            $table->string('article_code');
            $table->date('date');
            $table->integer('first_stok');
            $table->integer('sales');
            $table->integer('refund');
            $table->integer('retur');
            $table->integer('receipt_po');
            $table->integer('receipt');
            $table->integer('issue');
            $table->integer('transferOut');
            $table->integer('transferIn');
            $table->integer('last_stok');
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
