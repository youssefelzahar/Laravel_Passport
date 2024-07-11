<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestApiController extends Controller
{
    
    public function getUser(){
        $user=auth('api')->user();

        return response()->json(['user'=>$user]);
    }
}
