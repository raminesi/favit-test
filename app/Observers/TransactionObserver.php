<?php

namespace App\Observers;

use App\Models\Wallet;
use App\Models\WalletTransaction;

class TransactionObserver
{
    /**
     * Handle the WalletTransaction "created" event.
     *
     * @param  \App\Models\WalletTransaction  $walletTransaction
     * @return void
     */
    public function created(WalletTransaction $walletTransaction)
    {
        $wallet = Wallet::find($walletTransaction->wallet_id);
        $wallet->credit = $wallet->credit + ($walletTransaction->type == 'withdraw' ? -($walletTransaction->amount) : $walletTransaction->amount);
        $wallet->save();
    }

    /**
     * Handle the WalletTransaction "updated" event.
     *
     * @param  \App\Models\WalletTransaction  $walletTransaction
     * @return void
     */
    public function updated(WalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the WalletTransaction "deleted" event.
     *
     * @param  \App\Models\WalletTransaction  $walletTransaction
     * @return void
     */
    public function deleted(WalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the WalletTransaction "restored" event.
     *
     * @param  \App\Models\WalletTransaction  $walletTransaction
     * @return void
     */
    public function restored(WalletTransaction $walletTransaction)
    {
        //
    }

    /**
     * Handle the WalletTransaction "force deleted" event.
     *
     * @param  \App\Models\WalletTransaction  $walletTransaction
     * @return void
     */
    public function forceDeleted(WalletTransaction $walletTransaction)
    {
        //
    }
}
