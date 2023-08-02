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
        Schema::create('pendataan_pns', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('agama', ['ISLAM', 'KRISTEN', 'HINDU', 'BUDHA']);
            $table->enum('status_perkawinan', ['MENIKAH', 'BELUM MENIKAH', 'CERAI']);
            $table->enum('golongan', [
                'IV/A', 'III/D', 'III/C', 'III/B', 'III/A', 'II/D', 'II/C', 'II/B', 'II/A', 'I/D', 'I/C', 'I/B', 'I/A'
            ]);
            $table->date('tmt_golongan');
            $table->string('jabatan');
            $table->date('tmt_jabatan');
            $table->string('latihan_jabatan');
            $table->year('tahun_jabatan');
            $table->string('pendidikan_umum');
            $table->year('tahun_lulus');
            $table->string('ijazah');
            $table->enum('gol_darah', ['A', 'AB', 'B', 'O']);
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
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
        Schema::dropIfExists('pendataan_pns');
    }
};
