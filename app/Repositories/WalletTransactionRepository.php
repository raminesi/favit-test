<?php

namespace App\Repositories;

use App\Http\Resources\WalletTransactionResource;
use App\Models\WalletTransaction;

class WalletTransactionRepository
{
    protected $walletTransaction;
    public function __construct(WalletTransaction $walletTransaction)
    {
        $this->walletTransaction = $walletTransaction;
    }

    public function get($id, $user)
    {
        $list = $this->walletTransaction->orderBy('created_at' , 'asc')->where('wallet_id' , $id)
        ->whereHas('wallet' , function($query) use($user){
            return $query->where('user_id' , $user->id);
        })->get();
        return WalletTransactionResource::collection($list);
    }

    public function store($request)
    {
        $transaction = new $this->walletTransaction();
        $transaction->wallet_id = $request->wallet_id;
        $transaction->title = $request->title;
        $transaction->date = $request->date;
        $transaction->amount = $request->amount;
        $transaction->type = $request->type;
        $transaction->save();
        return true;
    }
}
