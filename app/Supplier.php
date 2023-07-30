<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $table = 'suppliers';
    protected $fillable = [
        'address', 'contact_no',
    ];
}
