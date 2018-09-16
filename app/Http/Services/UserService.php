<?php

namespace App\Http\Services;

use App\Http\Services\BaseService;
use App\Exceptions\UserAccessException;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserService extends BaseService
{
    public function __construct()
    {

    }

    public function get($user)
    {
        // TODO: Lazy load game history
        return $user;
    }

    public function create($email, $password, $name)
    {
        $user = User::create([
            'email' => $email,
            'password' => bcrypt($password),
            'name' => $name
        ]);

        return $user;
    }

    public function update($first_name, $last_name)
    {
        throw new Exception('Not implemented');
    }
}