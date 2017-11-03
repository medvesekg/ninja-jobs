<?php

namespace App\Http\Controllers;

use App\Company;
use App\CV;
use App\Job;
use App\Logo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{

    public function uredi(Request $request) {


        $user = User::findOrFail(Auth::id());

        if ($user->role->id == 1) {

            $input = $request->all();

            if ($file = $request->file('cv')) {

                $name = time() . "_" . $file->getClientOriginalName();
                $file->move('images', $name);


                $cv = CV::create(['path' => $name]);

                $input['cv_id'] = $cv->id;

            }

            $user->update($input);

            return redirect("/uredi");
        }

        elseif($user->role->id == 2) {

            $user->update([

                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'telephone' => $request->input('telephone'),

            ]);

            if($request->input('company_name') &&
                $request->input('company_address')) {

                if($user->company_id == 0) {

                    $logo_id = 0;
                    if($file = $request->file('company_logo')) {

                        $name = time() . "_" . $file->getClientOriginalName();
                        $file->move('images', $name);


                        $logo = Logo::create(['path' => $name]);

                        $logo_id = $logo->id;

                    }

                    $company = Company::create([
                       'company_name' => $request->input('company_name'),
                        'company_address' => $request->input('company_address'),
                        'logo_id' => $logo_id,
                    ]);

                    $user->update(['company_id' => $company->id]);

                }

                else {

                    if($file = $request->file('company_logo')) {

                        $name = time() . "_" . $file->getClientOriginalName();
                        $file->move('images', $name);


                        $logo = Logo::create(['path' => $name]);

                        $logo_id = $logo->id;

                    } else {

                        $logo_id = Company::findOrFail($user->company_id)->company_logo_id;

                    }

                    $company = Company::findOrFail($user->company_id);
                    $company->update([
                        'company_name' => $request->input('company_name'),
                        'company_address' => $request->input('company_address'),
                        'logo_id' => $logo_id
                    ]);
                }

            }

            return redirect('/uredi');




        }

    }

    public function ustvari(Request $request) {

        $input = $request->all();

        $input['company_id'] = Auth::user()->company->id;

        Job::create($input);

        return redirect("/");

    }


}
