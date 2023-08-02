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
        Schema::create('pendataan_tnis', function (Blueprint $table) {
            $table->id();
            $table->string('nrp');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('agama', ['ISLAM', 'KRISTEN', 'HINDU', 'BUDHA']);
            $table->enum('status_perkawinan', ['MENIKAH', 'BELUM MENIKAH', 'CERAI']);
            $table->enum('pangkat', [
                'Kolonel', 'Letkol', 'Mayor', 'Kapten', 'Lettu', 'Letda', 'Peltu', 'Pelda',
                'Serma', 'Serka', 'Sertu', 'Serda', 'Kopka', 'Koptu', 'Kopda', 'Praka', 'Pratu', 'Prada'
            ]);
            $table->string('corps');
            $table->string('pendidikan_umum');
            $table->string('pendidikan_militer');
            $table->date('tmt_tni');
            $table->date('tmt_corps');
            $table->string('jabatan');
            $table->date('tmt_jabatan');
            $table->enum('gol_darah', ['A', 'AB', 'B', 'O']);
            $table->enum('jenis_kelamin', ['LAKI-LAKI', 'PEREMPUAN']);
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
        Schema::dropIfExists('pendataan_tnis');
    }
};
