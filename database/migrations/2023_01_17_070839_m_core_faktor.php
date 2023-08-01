<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MCoreFaktor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('m_core_faktor', function (Blueprint $table) {
            $table->id('id_core_faktor');
            $table->integer('id_hitung');
            $table->integer('id_data_uji');
            $table->integer('id_kriteria');
            $table->string('nilai_core_faktor');
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
