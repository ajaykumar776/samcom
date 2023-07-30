<?php
// File: app/Models/UserData.php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'user_datas';
    protected $fillable = [
        'name',
        'email',
        'role',
        'address',
        'contact_no',
    ];

    // Optionally, you can specify the table name explicitly:
}
