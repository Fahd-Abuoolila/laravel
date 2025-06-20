<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class setting_model extends Model
{
    protected $table = "users";

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'ability',
        'job',
        'active',
    ];
}
