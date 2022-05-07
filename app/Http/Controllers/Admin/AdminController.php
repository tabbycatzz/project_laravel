<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginAdmin() {
        if(auth()->check()) {
            return redirect()->to('home'); //admin.home
        }
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        //
        $remember = $request->has('remember')?true:false;
        if(auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('home');
        }
        Session::flash('error', 'Email hoặc mật khẩu không chính xác');//
        return redirect()->back();//
    }

    public function logOutAdmin(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('admin');
    }
}
