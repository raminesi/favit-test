<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'wallet_id',
        'title',
        'date',
        'amount',
        'type'
    ];

    public function wallet(){
        return $this->belongsTo(Wallet::class);
    }
}
