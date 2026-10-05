<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Sungai extends Model
{
    protected $table = 'sungais';

    protected $primaryKey = 'sungai_id';

    protected $fillable = [
        'nama_sungai',
        'alamat',
        'status',
        'tipe_sungai',
        'geometri',
    ];

    /**
     * Relationships
     */
    
    // Administrators assigned to manage this river.
    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(
            Admin::class,
            'admin_sungai',
            'sungai_id',
            'admin_id'
        );
    }

    // Reports submitted for this river.
    public function laporanSungais(): HasMany
    {
        return $this->hasMany(
            LaporanSungai::class,
            'sungai_id',
            'sungai_id'
        );
    }

    /**
     * Images belonging directly to this river.
     *
     * These are different from images belonging to a
     * LaporanSungai. The latter are accessible through
     * LaporanSungai::gambarSungais().
     */
    public function gambarSungais(): MorphMany
    {
        return $this->morphMany(
            GambarSungai::class,
            'imageable'
        );
    }
}
