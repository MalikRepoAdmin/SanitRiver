<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AdminSungai extends Pivot
{
    protected $table = 'admin_sungai';
    public $incrementing = false;
    protected $guarded = [];
}