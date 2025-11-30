<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCopyInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'copy_trader_id',
        'copy_trader_package_id',
        'mode',
        'investment_amount',
        'copy_amount',
        'cost_per_order',
        'fee_percentage',
        'fee_amount',
        'net_investment',
        'min_profit_percentage',
        'max_profit_percentage',
        'start_date',
        'period_days',
        'status',
    ];

    protected $casts = [
        'start_date'        => 'datetime',
        'investment_amount' => 'decimal:8',
        'copy_amount'       => 'decimal:8',
        'cost_per_order'    => 'decimal:8',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }

    public function transactions()
    {
        return $this->hasMany(CopyTransaction::class, 'user_investment_id');
    }

    // Method to get current balance from transactions
    public function getCurrentBalanceAttribute()
    {
        return $this->transactions()->sum('amount');
    }
    public function copyTraderPackage()
    {
        return $this->belongsTo(CopyTraderPackage::class, 'copy_trader_package_id');
    }

}
