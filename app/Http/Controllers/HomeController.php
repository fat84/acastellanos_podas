<?php

namespace Corponor\Http\Controllers;

use Corponor\Denuncia;
use Corponor\Solicitud;
use Corponor\User;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == "admin"){
            return redirect()->route('admin_home');
        }
        $solicitudes = Solicitud::where('user_id', $user->id)->count();
        $denuncias = Denuncia::where('user_id', $user->id)->count();
        return view('home', ['cant_solicitudes'=>$solicitudes,'cant_denuncias'=>$denuncias]);
    }

    public function indexAdmin()
    {
        $user = Auth::user();
        if($user->role != 'admin'){
            return redirect()->route('home');
        }
        $solicitudes = Solicitud::where('estado', 'Pendiente')->count();
        $denuncias = Denuncia::where('estado', 'Pendiente')->count();
        return view('home_admin', ['cant_solicitudes'=>$solicitudes,'cant_denuncias'=>$denuncias]);
    }
}
