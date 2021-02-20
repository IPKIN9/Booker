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
        return view('auth.login.Login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $request->validate([
            'username' => 'required|string|string|max:255',
            'password' => 'required|min:6',
        ]);

        $name = DB::table('users')->where('username', $request->email)->value('name');

        if (Auth::attempt($credentials)) {
            $request->session()->put('login', $name);
            echo "success";
            // return redirect(route('dashboard'));
        } else {
            return redirect(route('LoginView'))->withInput()->with('status', 'Email atau Password salah');
        }
    }

    public function regist()
    {
        return view('auth.register.Register');
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
}
