<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArbitrageSubscription extends Model
{
    protected $fillable = [
        'user_id',
        'arbitrage_bot_id',
        'wallet_id',
        'amount',
        'fee_deducted',
        'apr_interval',
        'apr_percentage',
        'profit',
        'start_at',
        'end_at',
        'status',
        'transaction_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function arbitrageBot()
    {
        return $this->belongsTo(ArbitrageBot::class);
    }
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
