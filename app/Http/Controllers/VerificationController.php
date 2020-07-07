<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('remember_token', $token)->first();
        if (!is_null($user)){
            $user->status = 1;
            $user->remember_token = Null;
            $user->save();
            session()->flash('success','You are registered successfully ! Login now');
            return redirect()->route('login');
        }else{
            session()->flash('errors','Sorry your token is not matched.');
            return redirect()->route('home');
        }


    }
}
