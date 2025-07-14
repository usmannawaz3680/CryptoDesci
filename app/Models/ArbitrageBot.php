<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArbitrageBot extends Model
{
    protected $guarded = [];
    public function fees()
    {
        return $this->hasMany(ArbitrageFee::class, 'arbitrage_bot_id', 'id');
    }
    public function intervals()
    {
        return $this->hasMany(ArbitrageInterval::class, 'arbitrage_bot_id', 'id');
    }
    public function tradingPair()
    {
        return $this->belongsTo(TradingPair::class);
    }
}
