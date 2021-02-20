<?php

namespace App\Http\Controllers\ManualAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
}
