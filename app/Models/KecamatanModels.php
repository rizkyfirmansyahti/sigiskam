<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KecamatanModels extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kecamatan';
    protected $guarded = [];
    public function kelurahan()
    {
        return $this->hasMany(KelurahanModels::class, 'id_kecamatan');
    }
}
