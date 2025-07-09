<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchanges';
    protected $fillable = [
        'coingecko_id',
        'name',
        'tv_prefix',
        'country',
        'url',
        'logo'
    ];
}
