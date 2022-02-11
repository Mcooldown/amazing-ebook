<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Account extends Authenticatable
{
    protected $primaryKey = "account_id";
    protected $guarded = [];
    public $timestamps = false;

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
