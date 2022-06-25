<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(!Auth::attempt($userData)){
            $data = [
                'status' => 400,
                'errors' => [
                    'result' => 'Не удаловь войти',
                ],
            ];
            return response()->json($data, $data['status']);
        }
        $data = [
            'status' => 200,
            'url' => route('profile'),
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
}
