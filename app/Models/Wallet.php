<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{


    protected static function booted()
    {
        static::creating(function ($user) {
            do {
                $uid = str_pad(random_int(0, 99999999999), 11, '0', STR_PAD_LEFT);
            } while (self::where('wallet_uid', $uid)->exists());

            $user->user_uid = $uid;
        });
    }
}
