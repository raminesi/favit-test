<?php

namespace App\Repositories;

use App\Http\Resources\UserResource;
use App\Http\Resources\WalletResource;
use App\Models\User;

class UserRepository
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get($request)
    {
        $list = $this->user->orderBy('created_at' , 'asc');
        if(!empty($request->user_id)){

        }
        return UserResource::collection($list->get());
    }

    public function get_wallets($id)
    {
        $user = $this->user->where('id' ,$id)->first();
        if($user){
            return WalletResource::collection($user->wallets);
        }
        return false;
    }
}
