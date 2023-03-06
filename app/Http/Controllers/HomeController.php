<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Estado;
use App\Models\User;
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
    public function index()
    {
        //original
        //return view('home');
        
        $lstEstados = Estado::all();
        $lstUsuarios = Usuario::all();
        $lstUsers = User::all();
        $creador = Auth::user();
        return view('home',["estds"=>$lstEstados, "mios"=>$lstUsuarios, "default"=>$lstUsers, "actual"=>$creador]);
    }
}
