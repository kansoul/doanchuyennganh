<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public $table = "product_type";

	protected $fillable = [
        'id',	'name','img','hot'
    ];
}
