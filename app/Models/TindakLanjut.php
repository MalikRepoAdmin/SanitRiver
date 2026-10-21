<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tindakLanjut extends Model
{
    protected $table = 'tindak_lanjuts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'laporansungai_id',
        'petugas',
        'tindakan',
        'status',
        'tanggal_tindak_lanjut',
    ];
    public function laporanSungai()
    {
        return $this->belongsTo(LaporanSungai::class, 'laporansungai_id', 'laporansungai_id');
    }
}
