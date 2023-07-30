<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name', 'email', 'role', 'profile_image', 'phone', 'address', 'contact_number',
    ];
}
