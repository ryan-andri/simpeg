<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendataan_tks', function (Blueprint $table) {
            $table->id();
            $table->string('nit');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('agama', ['ISLAM', 'KRISTEN', 'HINDU', 'BUDHA']);
            $table->enum('status_perkawinan', ['MENIKAH', 'BELUM MENIKAH', 'CERAI']);
            $table->date('tanggal_sprin');
            $table->date('tmt_tks');
            $table->string('pendidikan_umum');
            $table->year('tahun_lulus');
            $table->enum('gol_darah', ['A', 'AB', 'B', 'O']);
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('kualifikasi');
            $table->string('penugasan');
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
        Schema::dropIfExists('pendataan_tks');
    }
};
