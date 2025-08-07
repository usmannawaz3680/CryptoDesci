<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyTrader extends Model
{
    protected $table = 'copy_traders';

    protected $casts = [
        'badges' => 'array',
        'asset_preferences' => 'array',
        'position_history' => 'array',
    ];

    protected $fillable = [
        'name', 'username', 'email', 'bio', 'risk_level', 'level', 'trading_style', 'status', 
        'badges', 'followers', 'copiers', 'trades', 'win_trades', 'win_rate', 'total_aum', 
        'roi', 'pnl', 'sharp_ratio', 'mdd', 'profit_sharing', 'lead_balance', 'min_copy_amount', 
        'max_copy_amount', 'member_since', 'asset_preferences', 'position_history',
    ];
    
    public function feeProfitRanges()
    {
        return $this->hasMany(CopyTraderFeeProfit::class, 'copy_trader_id');
    }
}