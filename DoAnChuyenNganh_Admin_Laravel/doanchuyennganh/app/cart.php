<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public $table = "cart";

	protected $fillable = [
        'id',	'id_customer',	'id_sp',	'qlt',	'note','status'
    ];
}
