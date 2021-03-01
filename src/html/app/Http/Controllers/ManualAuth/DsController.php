<?php

namespace App\Http\Controllers\ManualAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('cms.dashboard.DsMaster');
        }
        else
        {
            return redirect(route('LoginView'))->with('status', 'Login Terlebih Dahulu');
        }
    }
}
