<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function wallets()
    {
        return $this->hasMany(Wallet::class, 'user_id', 'id');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class, 'user_id', 'id');
    }
    public function withdrawls()
    {
        return $this->hasMany(Withdrawl::class, 'user_id', 'id');
    }

    public function CopyInvestmentCount() : int
    {
        return $this->hasMany(UserCopyInvestment::class, 'user_id', 'id')->count();
    }
    public function copyInvestments() : HasMany
    {
        return $this->hasMany(UserCopyInvestment::class, 'user_id', 'id');
    }
    public function totalUnrealizedPnl()
    {
        return $this->copyInvestments()
            ->where('status', 'active')
            ->get()
            ->sum(function ($inv) {
                return $inv->transactions()->sum('amount') - $inv->net_investment;
            });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    protected static function booted()
    {
        static::creating(function ($user) {
            do {
                $uid = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            } while (self::where('user_uid', $uid)->exists());

            $user->user_uid = $uid;
        });
    }
}
