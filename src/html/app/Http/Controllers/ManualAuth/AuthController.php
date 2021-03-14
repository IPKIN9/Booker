<?php

namespace App\Http\Controllers\ManualAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            return view('cms.dashboard.DsMaster');
        }
        return view('cms.auth.Login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required|string|string|max:255',
            'password' => 'required|min:6',
        ]);
        $credentials = $request->only('username', 'password');
        $name = DB::table('users')->where('username', $request->username)->value('name');
        if (Auth::attempt($credentials)) {
            $request->session()->put('login', $name);
            return redirect(route('dashboard'));
        } else {
            return redirect(route('LoginView'))->with('status', 'Username or Password Wrong');
        }
    }

    public function regist()
    {
        return view('cms.auth.Register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|string|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);

        $data = array([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert($data);
        return redirect(route('LoginView'))->with('status','Input Success');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('login');
        return redirect(route('LoginView'));
    }
}
