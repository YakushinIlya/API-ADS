<?php

namespace App\Http\Controllers\Auth;

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
        return 'Login form';
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
