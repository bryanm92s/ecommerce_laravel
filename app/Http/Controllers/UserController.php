<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $req){
        // Llamamos nuestro modelo.
        $user= User::where(['email'=>$req->email])->first();
        // Validamos que el usuario y la clave sean correctas.
        if(!$user || !Hash::check($req->password,$user->password)){
            return "Username or password is not matched";
        }else{
            $req->session()->put('user', $user);
            // Redirigimos a la página index de productos.
            return redirect('/');
        }
    }
}
