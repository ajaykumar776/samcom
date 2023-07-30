<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{

    protected $table = 'user_images';
    protected $fillable = [
        'user_id', 'file_original_name', 'file_name', 'file_size', 'extension'
    ];
}
