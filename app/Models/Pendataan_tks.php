<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataan_tks extends Model
{
    use HasFactory;
    protected $fillable = [
        'nit',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'status_perkawinan',
        'tanggal_sprin',
        'tmt_tks',
        'pendidikan_umum',
        'tahun_lulus',
        'gol_darah',
        'jenis_kelamin',
        'kualifikasi',
        'penugasan'
    ];
}