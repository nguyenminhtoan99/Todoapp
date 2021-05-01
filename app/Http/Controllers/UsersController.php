<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    public function index(){
        return view('users.login');
    }

    public function register(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('user.index');
    }

    public function login(Request $request)
    {
        $email = $request->email;
		$password = $request->password;
		if( Auth::attempt(['email' => $email, 'password' =>$password])) {
			// Kiểm tra đúng email và mật khẩu sẽ chuyển trang
			return redirect()->route('todos.index');
		} else {
			// Kiểm tra không đúng sẽ hiển thị thông báo lỗi

			return back();
		}
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
