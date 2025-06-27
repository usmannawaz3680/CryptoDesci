<?php

namespace App\Services;

use App\Models\User;
use App\Models\AssetCoin as Asset;
use App\Models\Wallet;
use Illuminate\Support\Str;

class WalletService
{
    public function createForUser(User $user): void
    {
        $assets = Asset::where('is_active', true)->get();

        foreach ($assets as $asset) {
            Wallet::create([
                'user_id' => $user->id,
                'asset_coin_id' => $asset->id,
                'balance' => 0
            ]);
        }
    }
}
