<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyAutoInvestment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'copy_trader_id',
        'amount',
        'frequency',
        'status',
        'last_run_at',
        'next_run_at',
    ];

    protected $casts = [
        'amount'      => 'decimal:8',
        'last_run_at' => 'datetime',
        'next_run_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function copyTrader()
    {
        return $this->belongsTo(CopyTrader::class);
    }
}
