<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsulanInfrastruktur extends Model
{
    protected $fillable = ['lokasi_usulan', 'jenis_infrastruktur', 'alasan_kebutuhan', 'tingkat_urgensi'];

}
