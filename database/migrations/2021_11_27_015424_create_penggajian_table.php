<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggajianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_karyawan')->unsigned();
            $table->string('id_tunjangan');
            $table->date('tanggal_gajian');
            $table->string('bulan_gajian');
            $table->string('tahun_gajian');
            $table->string('potongan');
            $table->string('total_gajian');
            $table->string('total_tunjangan');
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
        Schema::dropIfExists('penggajian');
    }
}
