<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MSecondaryFaktor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('m_secondary_faktor', function (Blueprint $table) {
            $table->id('id_secondary_faktor');
            $table->integer('id_hitung');
            $table->integer('id_data_uji');
            $table->integer('id_kriteria');
            $table->string('nilai_secondary_faktor');
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
