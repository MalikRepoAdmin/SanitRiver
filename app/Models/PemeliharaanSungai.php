<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PemeliharaanSungai extends Model
{
    protected $table = 'pemeliharaan_sungais';

    protected $primaryKey = 'pemeliharaan_id';

    protected $fillable = [
        'user_id',
        'sungai_id',
        'judul',
        'jenis_kegiatan',
        'tanggal',
        'status',
        'deskripsi',
        'catatan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function sungai(): BelongsTo
    {
        return $this->belongsTo(Sungai::class, 'sungai_id', 'sungai_id');
    }
}
