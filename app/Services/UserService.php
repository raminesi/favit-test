<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function __call($method, $arguments)
    {
        return $this->userRepository->$method(@$arguments[0], @$arguments[1], @$arguments[2]);
    }
}
