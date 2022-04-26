<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public $table = "customer";

	protected $fillable = [
        'id',	'name',	'img','phone',	'address',	'username',	'password',	'mkh',
    ];
}

