<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;

class RegisterController extends Controller
{
    public $error = [];

    public function reg(Request $request)
    {
        $userData = $request->only(['email']);
        $passwordNew = Str::random(config('custom.user.register.password.lenght'));
        $validator=$this->rule($userData);
        if($validator->fails()){
            $data = [
                'status' => 422,
                'errors' => $validator->messages(),
            ];
            return response()->json($data, $data['status']);
        }

        $userData['password'] = Hash::make($passwordNew);
        $userData['token_auth'] = Str::random(100);
        if(User::create($userData)){
            $userData['password'] = $passwordNew;
            //Mail::to($userData['email'])->send(new RegisterMail($userData));

            $data = [
                'status' => 200,
                'message' => config('custom.user.register.message.success').' '.$userData['password'].'<br>'.$userData['token_auth'],
            ];
            return response()->json($data, $data['status']);
        }

        $data = [
            'status' => 400,
            'message' => config('custom.user.register.message.error'),
        ];
        return response()->json($data, $data['status']);
    }

    public function rule($data)
    {
        return Validator::make($data, [
            'email'    => 'required|email|unique:users',
        ]);
    }
}
