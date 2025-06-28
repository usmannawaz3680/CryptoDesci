<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id',
        'asset_coin_id',
        'amount',
        'network',
        'trx_id',
        'from_address',
        'receipt_img',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coin()
    {
        return $this->belongsTo(AssetCoin::class, 'asset_coin_id', 'id');
    }

}
