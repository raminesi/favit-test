<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WalletService;
use App\Services\WalletTransactionService;
use Exception;


class WalletTransactionController extends Controller
{
    protected $walletService;
    protected $walletTransactionService;

    public function __construct(WalletService $walletService, WalletTransactionService $walletTransactionService)
    {
        $this->walletService = $walletService;
        $this->walletTransactionService = $walletTransactionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try{
            $transactions = $this->walletTransactionService->get($id , $this->user_info());
            return view('transaction.transactions' , compact('transactions'));
        }catch(Exception $e){
            return abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id)
    {
        $wallet = $this->walletService->find($id , $this->user_info());
        return view('transaction.add' , compact('wallet' , 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $wallet = $this->walletService->find($request->wallet_id , $this->user_info());
            if($wallet){
                $this->walletTransactionService->store($request);
                return redirect()->route('wallet_transaction' , [$request->wallet_id]);
            }
            return abort(500);
        }catch(Exception $e){
            dd($e);
            return abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
