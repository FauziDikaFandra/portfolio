<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSItemMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_item_master', function (Blueprint $table) {
            $table->id();
            $table->string('plu');
            $table->string('article_code');
            $table->string('burui');
            $table->string('brand');
            $table->string('description');
            $table->string('long_description');
            $table->string('frgn_description');
            $table->decimal('price');
            $table->string('class');
            $table->string('dp2');
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
