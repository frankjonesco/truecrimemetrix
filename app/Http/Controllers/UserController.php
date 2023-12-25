<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;

class UserController extends Controller
{


    // VIEW LOGIN FORM

    public function viewLogin(){

        Meta::setTitle('Log in - '.config('app.name'));

        return view('users/login', [
            'pageHeadings' => [
                'Login',
                'Log in to manage your content.' 
            ]
        ]);

    }




    // AUTHENTICATE USER FOR LOGIN

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/admin')->with('toast', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');

    }




    // LOG USER OUT AND DESTRY SESSION

    public function logout(Request $request){

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('toast', 'You are logged out.');

    }




// END OF CLASS

}
