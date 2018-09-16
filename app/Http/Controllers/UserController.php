<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;
use App\Http\Services\UserService;
use App\Http\Responses\StandardResponse;

class UserController extends Controller
{
    private $user_service;

    public function __construct(UserService $userService) {
        $this->user_service = $userService;
    }

    public function get()
    {
        $user = Auth::user();
        $user = $this->user_service->get($user);
        return new StandardResponse($user);
    }
    
    public function register(Request $request)
    {
        $validation_rules = array(
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'name'=>'required|string|min:1|max:255',
        );

        $validator = Validator::make($request->input(), $validation_rules);

        if ($validator->fails()) {
            throw new ValidationException($validator->messages()->toArray(), 'Validation failure.');
        }

        $user = $this->user_service->create(
            $request->get('email'),
            $request->get('password'),
            $request->get('name')
        );

        return new StandardResponse($user);
    }
}
