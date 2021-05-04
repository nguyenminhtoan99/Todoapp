<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index(){
        return view('users.login');
    }

    public function showregister(){
        return view('users.register');
    }
    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        session()->flash('success', 'register successful!');
        return redirect()->route('user.index');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
		$password = $request->password;
		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
			return redirect()->route('todos.index');
		} else {
            session()->flash('error', 'Email or password is incorrect!');
            return back()->withInput();
		}
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
