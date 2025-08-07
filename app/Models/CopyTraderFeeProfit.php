<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyTraderFeeProfit extends Model
{
    protected $table = 'copy_trader_fee_profit_ranges';
    
    protected $fillable = [
        'copy_trader_id',
        'min_amount',
        'max_amount',
        'fee_percentage',
        'min_profit_percentage',
        'max_profit_percentage',
    ];
    
    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }
}
