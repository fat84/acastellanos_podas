<?php

namespace Corponor\Http\Controllers;

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
        $solicitudes = Solicitud::where('user_id', $user->id)->count();
        return view('home', ['cant_solicitudes'=>$solicitudes]);
    }
}
