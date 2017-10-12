<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NinjaController extends Controller
{


    public function frontpage()
    {

        $user = Auth::user();
        return view('frontpage')->with(['user' => $user]);
    }

    public function seznam()
    {

        $user = Auth::user();
        $all_users = User::all();
        return view('seznam')->with(['user' => $user, 'all_users' => $all_users]);

    }

}
