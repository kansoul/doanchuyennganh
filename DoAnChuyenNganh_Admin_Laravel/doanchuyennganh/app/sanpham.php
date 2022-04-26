<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    public $table = "product";

	protected $fillable = [
        'id',	'title',	'img1', 'img2', 'img3', 'type',	'qlt',	'price',	'msp',	'description', 'isPopular',
    ];
}
