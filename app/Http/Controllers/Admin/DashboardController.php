<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\WalletService;
use Exception;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $walletService;

    public function __construct(WalletService $walletService)
    {
        $this->walletService = $walletService;
    }

    public function index(Request $request)
    {
        try{
            $wallets = $this->walletService->get_my_wallet($request , $this->user_info());
            return view('wallet.wallets' , compact('wallets'));
        }catch(Exception $e){
            return abort(500);
        }
    }
}
