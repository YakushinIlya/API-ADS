<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showTest()
    {
        $data = [
            'firstName' => 'John',
            'lastName'  => 'Smith',
        ];
        
        return response()->json($data)->setStatusCode(200, 'Ok!!!');
    }
}
