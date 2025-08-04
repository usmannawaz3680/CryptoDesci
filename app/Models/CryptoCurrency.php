<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoCurrency extends Model
{
    protected $table = 'crypto_currencies_list';
    
    protected $fillable = [
        'coingecko_id',
        'name',
        'symbol',
        'logo_url',
        'is_active'
    ];
}