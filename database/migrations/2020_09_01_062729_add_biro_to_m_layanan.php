<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBiroToMLayanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_layanan', function (Blueprint $table){ 
            $table->string('keterangan',255)->nullable();
            $table->string('kode_biro',10)->nullable();
            $table->string('comp',5)->nullable();
            $table->string('status_layanan',2)->nullable();
            $table->string('gambar',255)->nullable();
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