<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {
            if ($validator->fails()){
                return redirect()->back()->with('failure', $validator->errors()->first());
            }
            $attempt_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

            if ($attempt_login) {
                $redirect = '';

                switch (Auth::user()->role->id) {
                    case 1:
                        $redirect = '/student';
                        break;
                    case 2:
                        $redirect = '/home';
                        break;
                    default:
                        break;
                }

                return redirect()->to($redirect);
            }else{
                return redirect()->back()->with('failure', 'Incorrect Email or Password');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('failure', $e->getMessage());
        }

    }

    public function homepage()
    {
        return view('home', ['user' => Auth::user()]);
    }
}
