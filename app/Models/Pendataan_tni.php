<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendataan_tni extends Model
{
    use HasFactory;
    protected $fillable = [
        'nrp',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'agama',
        'status_perkawinan',
        'pangkat',
        'corps',
        'pendidikan_umum',
        'pendidikan_militer',
        'tmt_tni',
        'tmt_corps',
        'jabatan',
        'tmt_jabatan',
        'gol_darah',
        'jenis_kelamin'
    ];
}
