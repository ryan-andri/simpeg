<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataan_pns extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'pendidikan_umum',
        'tahun_lulus',
        'status_perkawinan',
        'jenis_kelamin',
        'ijazah',
        'nip',
        'golongan',
        'tmt_golongan',
        'jabatan',
        'tmt_jabatan',
        'latihan_jabatan',
        'tahun_jabatan',
        'gol_darah',
        'penugasan'
    ];
}