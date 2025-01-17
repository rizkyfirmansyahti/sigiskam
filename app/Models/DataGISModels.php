<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGISModels extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'datagis';
    protected $fillable = [
        'tanggal',
        'waktu',
        'kecamatan',
        'kelurahan',
        'latitude',
        'longitude',
        'kepala_keluarga',
        'jiwa',
        'materi',
        'keterangan',
    ];
}
