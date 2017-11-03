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

    public function seznam($id = null)
    {
        $user = Auth::user();

        if($id) {
            $selected_user = User::findOrFail($id);
            return view('user_profile')->with(['selected_user' => $selected_user, 'user' => $user]);
        }


        $all_users = User::all();
        return view('seznam')->with(['user' => $user, 'all_users' => $all_users]);

    }

    public function ustvari()
    {
        $user = Auth::user();

        if($user->role->id != 2) {
            return redirect('/');
        }

        return view('ustvari_zaposlitev')->with(['user'=>$user]);

    }

    public function uredi() {

        $user = Auth::user();

        return view('uredi_profil')->with(['user'=>$user]);

    }

}
