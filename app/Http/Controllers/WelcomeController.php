<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;

class WelcomeController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user->articles()->paginate();
    }
}
