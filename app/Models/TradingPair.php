<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradingPair extends Model
{
    protected $table = 'trading_pairs';
    protected $guarded = [];
    public function exchange()
    {
        return $this->belongsTo(Exchange::class);
    }
}
