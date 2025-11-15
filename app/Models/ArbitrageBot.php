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
    public function interval()
    {
        return $this->hasOne(ArbitrageInterval::class);
    }
    public function intervals()
    {
        return $this->hasMany(ArbitrageInterval::class);
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

    public function getPairAttribute()
    {
        return $this->tradingPair->base_asset . '/' . $this->tradingPair->quote_asset;
    }
}
