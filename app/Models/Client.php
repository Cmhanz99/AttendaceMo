<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public $table = 'clients';

    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'password'
    ];
}
