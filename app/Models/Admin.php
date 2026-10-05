<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['username', 'password'])]
#[Hidden(['password', 'remember_token'])]
class Admin extends Authenticatable
{
    /** @use HasFactory<AdminFactory> */
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $primaryKey = 'admin_id';

    /**
     * Relationships
     */

    /**
     * Rivers managed by this administrator.
     *
     * An administrator can manage multiple rivers,
     * and a river can be managed by multiple administrators.
     */
    public function sungais(): BelongsToMany
    {
        return $this->belongsToMany(
            Sungai::class,
            'admin_sungai',
            'admin_id',
            'sungai_id'
        );
    }
}
