<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangeMyInfoController extends Controller
{
    //

    public function changePassword() {
        return view('layouts.admin.chang_info.change_password');
    }

    public function storePassword(Request $request) {
        $this->validate($request , [
            'password'=>'required|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();  
        return redirect()->route('home');
    }
}

