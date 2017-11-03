<?php

namespace App\Http\Controllers;

use App\CV;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{

    public function uredi(Request $request) {


        $user = User::findOrFail(Auth::id());

        $input = $request->all();

        if($file = $request->file('cv')) {

            $name = time() . "_" . $file->getClientOriginalName();
            $file->move('images', $name);


            $cv = CV::create(['path' => $name]);

            $input['cv_id'] = $cv->id;

        }

        $user->update($input);

        return redirect("/uredi");

    }

}
