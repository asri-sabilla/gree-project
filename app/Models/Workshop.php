<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'title',
        'description',
        'date',
        'lokasi',
        'price',
        'poster'
    ];

}
