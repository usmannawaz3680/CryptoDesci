<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CopyTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_investment_id', 'type', 'amount', 'profit_percentage', 'transaction_date',
    ];

    public function investment()
    {
        return $this->belongsTo(UserCopyInvestment::class);
    }
}