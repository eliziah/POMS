<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);


        User::where('email', $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            
            Alert::success('Success', 'Login success !');
            return redirect()->intended('/dashboard');
        } else {
            Alert::error('Error', 'Login failed !');
            return redirect('/login');
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }
    
    public function changepassword(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        //check if same as user password
        if(!Hash::check($request->oldpassword, auth()->user()->password)){
            Alert::error('Error', 'Old password did not match!');
            return back();
        }

        User::where("id_user",auth()->user()->id_user)->update([
            'password' => Hash::make($request->password)
        ]);

        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Password has been changed! Please re-login.');
        return redirect('/login');
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password'
        ]);

        $validated['password'] = Hash::make($request['password']);

        $user = User::create($validated);

        Alert::success('Success', 'Register user has been successfully !');
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        return redirect('/login');
    }
}
