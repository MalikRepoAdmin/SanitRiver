<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class LaporanSungai extends Model
{
    protected $table = 'laporan_sungais';

    protected $primaryKey = 'laporansungai_id';

    protected $fillable = [
        'user_id',
        'sungai_id',
        'status',
        'persetujuan',
    ];

    /**
     * Relationships
     */

    
    // User who submitted this report.
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'user_id'
        );
    }

    // River being reported.
    public function sungai(): BelongsTo
    {
        return $this->belongsTo(
            Sungai::class,
            'sungai_id',
            'sungai_id'
        );
    }

    /**
     * Images uploaded as part of this report.
     *
     * Because the relationship is polymorphic, the same
     * GambarSungai table can also store images belonging
     * directly to a Sungai.
     */
    public function gambarSungais(): MorphMany
    {
        return $this->morphMany(
            GambarSungai::class,
            'imageable'
        );
    }
}
