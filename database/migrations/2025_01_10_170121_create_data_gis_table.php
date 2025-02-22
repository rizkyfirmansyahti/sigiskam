<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataGisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datagis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->time('waktu')->nullable();
            $table->string('id_kecamatan');
            $table->string('id_kelurahan');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('kepala_keluarga')->nullable();
            $table->integer('jiwa')->nullable();
            $table->string('materi')->nullable();
            $table->string('keterangan', 1000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_gis');
    }
}
