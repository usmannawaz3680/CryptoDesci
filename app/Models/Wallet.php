<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    protected $fillable = [
        'user_id',
        'asset_coin_id',
        'wallet_uid',
        'balance',
    ];
    protected static function booted()
    {
        static::creating(function ($wallet) {
            do {
                $uid = str_pad(random_int(0, 99999999999), 11, '0', STR_PAD_LEFT);
            } while (self::where('wallet_uid', $uid)->exists());

            $wallet->wallet_uid = $uid;
        });
    }
    public function coin()
    {
        return $this->belongsTo(AssetCoin::class, 'asset_coin_id', 'id');
    }
}
