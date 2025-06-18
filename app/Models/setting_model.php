<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class setting_model extends Model
{
    protected $table = "users";

    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'name',
        'email',
        'remember_token',
        'ability',
        'job',
        'active',
    ];
}
