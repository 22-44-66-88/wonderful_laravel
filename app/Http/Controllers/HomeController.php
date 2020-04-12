<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
//        $request->user()->authorizeRole('adminstrador');
        $user = Auth::user();
//        return view('home');
        if ($request->user()->authorizeRole(['administrador'])) {
            return view('homeAdmin',compact('user'));
        }
        if ($request->user()->authorizeRole(['colaborador'])) {
            return view('home',compact('user'));
        }
        if ($request->user()->authorizeRole(['verificador'])) {
            return view('home',compact('user'));
        }

        if ($request->user()->authorizeRole(['client'])) {
            return view('home',compact('user'));
        }
    }
}
