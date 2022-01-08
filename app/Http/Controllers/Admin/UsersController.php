<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $users = $this->userService->get($request);
            return view('user.users' , compact('users'));
        }catch(Exception $e){
            return abort(500);
        }
    }

    public function wallets($id)
    {
        try{
            $wallets = $this->userService->get_wallets($id);
            return view('user.wallets' , compact('wallets'));
        }catch(Exception $e){
            return abort(500);
        }
    }

}
