<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'no_hp'=>'required',
        ]);

        auth()->user()->update($request->all());
        return redirect()->back()->with("success","Profile Berhasil di perbarui");
    }

    public function password(Request $request)
    {
        $request->validate([
            'password'=>'required'
        ]);
        
        auth()->user()->update([
            "password"=>bcrypt($request->password)
        ]);
        return redirect()->back()->with("success","Password Berhasil di perbarui");
    }
}
