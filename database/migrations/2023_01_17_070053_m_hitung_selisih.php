<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MHitungSelisih extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pm_hitung_selisih', function (Blueprint $table) {
            $table->id('id_hitung_selisih');
            $table->integer('id_hitung');
            $table->integer('id_data_uji');
            $table->integer('id_kriteria');
            $table->string('nilai_selisih');
            $table->timestamps();
            $table->softDeletes();
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
