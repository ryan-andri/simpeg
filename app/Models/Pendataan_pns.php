<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataan_pns extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'status_perkawinan',
        'golongan',
        'tmt_golongan',
        'jabatan',
        'tmt_jabatan',
        'latihan_jabatan',
        'tahun_jabatan',
        'pendidikan_umum',
        'tahun_lulus',
        'ijazah',
        'gol_darah',
        'jenis_kelamin',
        'penugasan',
    ];
}
