<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_get()
    {
        return view('authentication.login');
    }

    public function login_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'required|email|min:10',
           'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $credential = [
            'email' => $request['email'],
            'password' => $request['password']
        ];
        $rememberme = (!empty($request->rememberme)) ? true : false;

        if(Auth::attempt($credential)){
            $user = User::where(['email' => $credential['email']])->first();
            Auth::login($user, $rememberme);

            return redirect()->route('admin.dashboard');
        }

        return redirect()->back();

        /*$user = User::where('email', $request->email)->first();

        if ($user != null && Hash::check($request->password, $user->password)) {
            auth()->login($user);
            return redirect('admin');
        } else {
            return redirect()->route('login.get');
        }*/
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.get');
    }
}
