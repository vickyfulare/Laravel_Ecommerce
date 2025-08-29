<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Hash;

class UserController extends Controller
{
    //
    function login(Request $req)
    {
        $user =  User::where(['email'=>$req->email])->first();
        //return $user;
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or Paassword not matched";
        }else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
        
    }

    public function logout(Request $req)
{
    // Remove user session data
    $req->session()->forget('user');
    
    // Alternatively, you can use flush() to clear the entire session
    // $req->session()->flush();

    // Redirect to login or home page
    return redirect('/login');
}

//Register 

 function register(Request $req)
    {
        // Validate input fields
        $req->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:4'
        ]);

        // Create new user
        $user = new User;
        $user->name     = $req->name;
        $user->email    = $req->email;
        $user->password = Hash::make($req->password); // ✅ Hashing password
        $user->save();

        // Store user in session
       // $req->session()->put('user', $user);
        return redirect('/login');
    }

    // Forgot Password

    public function forgotPasswordView()
    {
        return view('forgot');  // Show forgot password page
    }

    public function forgotPassword(Request $req)
    {
        // Validate form input
        $req->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:4|confirmed'
        ]);

        // Find user by email
        $user = User::where('email', $req->email)->first();

        if ($user) {
            // Update password
            $user->password = Hash::make($req->password);
            $user->save();

            return redirect('/login')->with('success', 'Password updated successfully! Please login.');
        } else {
            return back()->with('error', 'Email not found.');
        }
    }



}
