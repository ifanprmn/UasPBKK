<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function indexRegister(){
        return view('register.index',[

            "title" => 'Register',
            "active" => ''
        ]);
    }
    public function Register(Request $request){
        $validateData= $request->validate([
            "name" => ['required','min:5','max:255','unique:users'],
            "username" => ['required','min:5','max:255','unique:users'],
            "email" => ['required','email:dns','unique:users'],
            "password" => ['required','min:5','max:15'],
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        session()->flash('berhasil', 'Registrasi berhasil dilakukan silahkan login!!');
        
        //var_dump (session()->all());

        //dd(session());

       return redirect('/login');
    }
}
