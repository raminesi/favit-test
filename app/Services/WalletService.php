<?php

namespace App\Services;

use App\Repositories\WalletRepository;

class WalletService
{
    protected $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function __call($method, $arguments)
    {
        return $this->walletRepository->$method(@$arguments[0], @$arguments[1], @$arguments[2]);
    }
}
