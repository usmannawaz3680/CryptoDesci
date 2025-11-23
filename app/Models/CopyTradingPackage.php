<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTradingPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'duration_days',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function traderPackages()
    {
        return $this->hasMany(CopyTraderPackage::class);
    }

    public function copyTraders()
    {
        return $this->belongsToMany(CopyTrader::class, 'copy_trader_packages')
            ->using(CopyTraderPackage::class)
            ->withPivot([
                'id',
                'loss_day',
                'min_loss_percentage',
                'max_loss_percentage',
                'is_active',
                'created_at',
                'updated_at',
            ]);
    }
}
