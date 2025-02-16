<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelurahanModels extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kelurahan';
    protected $guarded = [];
    public function kecamatan()
    {
        return $this->belongsTo(KecamatanModels::class, 'id_kecamatan');
    }
}
