<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaporanSungai extends Model
{
    protected $table = 'laporan_sungais';
    protected $primaryKey = 'laporan_id';
    protected $guarded = [];

    public function sungai(): BelongsTo
    {
        return $this->belongsTo(Sungai::class, 'sungai_id', 'sungai_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}