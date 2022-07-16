<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;

class LoginController extends Controller
{
    public $error = [];

    public function auth(Request $request)
    {
        $userData = $request->only(['email', 'password']);
        $validator=$this->rule($userData);

        if($validator->fails()){
            $data = [
                'status' => 422,
                'errors' => $validator->messages(),
            ];
            return response()->json($data, $data['status']);
        }

        if(Auth::attempt($userData)){
            $user = Auth::user();
            $data = [
                'status' => 200,
                'api_token' => $user->api_token,
                'url' => route('profile.index'),
            ];
            return response()->json($data, $data['status']);
        }

        $data = [
            'status' => 400,
            'message' => __('auth.user.auth.message.error_in'),
        ];
        return response()->json($data, $data['status']);
    }

    public function rule($data)
    {
        return Validator::make($data, [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);
    }

    public function logout()
    {
        Auth::logout();
    }
}
