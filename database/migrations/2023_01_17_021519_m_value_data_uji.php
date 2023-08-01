<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MValueDataUji extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pm_value_data_uji', function (Blueprint $table) {
            $table->id('id_value_data_uji');
            $table->integer('id_data_uji');
            $table->integer('id_kriteria');
            $table->string('nilai_data_uji');
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
