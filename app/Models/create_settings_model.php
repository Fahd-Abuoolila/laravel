<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class create_settings_model extends Model
{
    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'ability',
        'job',
        'active',
    ];
}
