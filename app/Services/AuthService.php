<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\ResponseTrait;

class AuthService
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function register($data)
    {

        // dd($data);
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        $user['token'] =  $user->createToken('authToken')->accessToken;
        $user['name'] =  $user->name;

        // return response()->json(['success' => $success]);
        return $user;
    }
}
