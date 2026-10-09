<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class GambarSungai extends Model
{
    protected $table = 'gambar_sungais';

    protected $primaryKey = 'gambarsungai_id';

    protected $fillable = [
        'file_path',
        'imageable_id',
        'imageable_type',
    ];

    /**
     * Relationships
     */

    /**
     * Entity that owns this image.
     *
     * This can currently be either:
     *
     * - Sungai
     * - LaporanSungai
     *
     * The relationship is polymorphic so the image table
     * does not need separate foreign-key columns for each
     * possible image owner.
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
