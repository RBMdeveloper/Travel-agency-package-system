<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\userprofile;

class ppages extends Controller
{
    public function home(){
        return view('welcome');
    }


    public function index(){
        $user = userprofile::with('user')->get();
        return $user;
    }

    
    
}


