<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawl extends Model
{
    protected $fillable = [
        'user_id',
        'asset_coin_id',
        'amount',
        'to_address',
        'txid',
        'status',
        'admin_note',
    ];
    public function coin()
    {
        return $this->belongsTo(AssetCoin::class, 'asset_coin_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
