<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function showTest()
    {
        $data = [
            'firstName' => 'John',
            'lastName'  => 'Smith',
            'email' => Auth::user()->email,
            'token' => 'lclmaHcwJQyr0uB7FcZwwHsDX8HZHRabiwUZMxcx1IOlEPYg76ZfRXPfE01J9JIhzQ0Fdxbq3KM9zDgfJSxIC0pKn1DYfuLArGBh'
        ];
        
        return response()->json($data)->setStatusCode(200, 'Ok!!!');
    }
}
