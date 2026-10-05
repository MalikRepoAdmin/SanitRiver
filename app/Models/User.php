<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $guarded = [];

    public function laporan(): HasMany
    {
        return $this->hasMany(LaporanSungai::class, 'user_id', 'user_id');
    }
}