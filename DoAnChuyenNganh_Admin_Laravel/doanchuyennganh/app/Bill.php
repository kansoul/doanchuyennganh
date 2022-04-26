<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public $table = "bill";

	protected $fillable = [
        'id',	'id_customer',	'id_sp',	'qlt',	'note','status'
    ];
}
