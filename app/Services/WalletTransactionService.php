<?php

namespace App\Services;

use App\Repositories\WalletTransactionRepository;

class WalletTransactionService
{
    protected $walletTransactionRepository;

    public function __construct(WalletTransactionRepository $walletTransactionRepository)
    {
        $this->walletTransactionRepository = $walletTransactionRepository;
    }

    public function __call($method, $arguments)
    {
        return $this->walletTransactionRepository->$method(@$arguments[0], @$arguments[1], @$arguments[2]);
    }
}
