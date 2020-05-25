<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rtrw extends Model
{
    protected $table = 'rtrws';
    protected $primaryKey = 'id'; 
    protected $fillable = [
        'username', 'password', 'email'
    ];
}
