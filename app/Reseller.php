<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{

    protected $table = 'resellers';
    protected $fillable = [
        'address', 'contact_no',
    ];
}
