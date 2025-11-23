<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTraderPackage extends Model
{
    use HasFactory;

    protected $table = 'copy_trader_packages';

    protected $fillable = [
        'copy_trader_id',
        'copy_trading_package_id',
        'loss_day',
        'min_loss_percentage',
        'max_loss_percentage',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }

    public function copyTradingPackage()
    {
        return $this->belongsTo(CopyTradingPackage::class);
    }

    public function investments()
    {
        return $this->hasMany(UserCopyInvestment::class, 'copy_trader_package_id');
    }
}
