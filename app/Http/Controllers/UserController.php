<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show register/create form
    public function create(){
        return view('users.register');
    }

    // Create new user
    public function store(Request $request){

         $formFields = $request->validate([
            'first_name' => ['required', 'min:2', 'max:25'],
            'last_name' => ['required', 'min:2', 'max:25'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8'],
            'agree_terms' => ['required'] 
         ]);

        // Create user
        $user = User::create([
            'hex' => Str::random(11),
            'first_name' => trim($request->first_name),
            'last_name' => trim($request->last_name),
            'email' => trim($request->email),
            'password' => bcrypt($request->password)
        ]);

         // Login
         auth()->login($user);

         return redirect('/')->with('message', 'User created & logged in!');
    }

    // Log user out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out.');
    }

    // Show login form 
    public function login(){
        return view('users.login');
    }

    // Authenticate user for login
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You have logged in!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->onlyInput('email');
    }

}
