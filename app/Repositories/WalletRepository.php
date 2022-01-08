<?php

namespace App\Repositories;

use App\Http\Resources\WalletResource;
use App\Models\Wallet;

class WalletRepository
{
    protected $wallet;
    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    public function get_my_wallet($request, $user)
    {
        $list = $this->wallet->orderBy('created_at' , 'asc')->where('user_id' , $user->id);
        return WalletResource::collection($list->get());
    }

    public function find($id, $user)
    {
        $wallet = $this->wallet->where('id' , $id)->where('user_id' , $user->id);
        return new WalletResource($wallet->first());
    }

    public function store($request , $user)
    {
        $wallet = new $this->wallet();
        $wallet->user_id = $user->id;
        $wallet->title = $request->title;
        $wallet->description = $request->description;
        $wallet->status = $request->status;
        $wallet->save();
        return true;
    }

    public function update($request, $id , $user)
    {
        $wallet = $this->wallet->where('id' , $id)->where('user_id' , $user->id)->first();
        if($wallet){
            $wallet->user_id = $user->id;
            $wallet->title = $request->title;
            $wallet->description = $request->description;
            $wallet->status = $request->status;
            $wallet->save();
            return true;
        }
        return false;
    }
}
