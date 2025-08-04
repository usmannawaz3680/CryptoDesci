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
    public function exchange_from()
    {
        return $this->belongsTo(Exchange::class, 'exchange_from_id');
    }
    public function exchange_to()
    {
        return $this->belongsTo(Exchange::class, 'exchange_to_id');
    }
}
