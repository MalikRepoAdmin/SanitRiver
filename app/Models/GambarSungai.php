<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class GambarSungai extends Model
{
    protected $table = 'gambar_sungais';
    protected $primaryKey = 'gambarsungai_id';
    protected $guarded = [];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}