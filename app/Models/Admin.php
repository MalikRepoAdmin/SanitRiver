<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'admin_id';
    protected $guarded = [];

    public function sungais(): BelongsToMany
    {
        return $this->belongsToMany(Sungai::class, 'admin_sungai', 'admin_id', 'sungai_id');
    }
}