<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
//        $request->user()->authorizeRole('adminstrador');
        $user = Auth::user();
        // dd(session('auth'));
//        return view('home');
        if ($request->user()->authorizeRole(['administrador'])) {
            return view('homeAdmin',compact('user'));
        }
        if ($request->user()->authorizeRole(['colaborador'])) {
            return view('homeCollaborator',compact('user'));
        }
        if ($request->user()->authorizeRole(['verificador'])) {
            return view('homeChecker',compact('user'));
        }

        if ($request->user()->authorizeRole(['cliente'])) {
            return view('homeClient',compact('user'));
        }
>>>>>>> 060a53449c260cfb482a528fe5b24100c9274db5
    }
}
