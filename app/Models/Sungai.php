<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sungai extends Model
{
    protected $table = 'sungais';
    protected $primaryKey = 'sungai_id';
    protected $guarded = [];

    public function laporan(): HasMany
    {
        return $this->hasMany(LaporanSungai::class, 'sungai_id', 'sungai_id');
    }

    public function admins(): BelongsToMany
    {
        return $this->belongsToMany(Admin::class, 'admin_sungai', 'sungai_id', 'admin_id');
    }
}