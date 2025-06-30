<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetCoin extends Model
{
    public function wallet()
    {
        return $this->hasMany(Wallet::class, 'asset_coin_id', 'id');
    }
}
