<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jabatan')->unsigned();
            $table->string('nama_karyawan')->unique();
            $table->enum('status', ['tetap','kontrak','magang']);
            $table->date('tanggal_masuk');
            $table->string('nomer_hp')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');
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
        Schema::dropIfExists('karyawan');
    }
}
