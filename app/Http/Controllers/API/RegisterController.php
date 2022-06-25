<?php

namespace App\Http\Controllers\API;

use App\Helpers\GenerateHelp;
use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class RegisterController extends Controller
{
    public $error = [];

    public function reg(Request $request)
    {
        $userData = $request->only(['email']);
        $passwordNew = GenerateHelp::password(config('custom.user.register.password.lenght'));
        $validator=$this->rule($userData);
        if($validator->fails()){
            $data = [
                'status' => 422,
                'errors' => $validator->messages(),
            ];
            return response()->json($data, $data['status']);
        }

        $userData['password'] = Hash::make($passwordNew);

        if(User::create($userData)){
            $userData['password'] = $passwordNew;
            Mail::to($userData['email'])->send(new RegisterMail($userData));

            $data = [
                'status' => 200,
                'message' => config('custom.user.register.message.success'),
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
