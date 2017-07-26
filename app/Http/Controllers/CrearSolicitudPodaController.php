<?php

namespace Corponor\Http\Controllers;

use Corponor\Http\Requests\CrearSolicitudPodaRequest;
use Corponor\Solicitud;
use Corponor\SolicitudArbol;
use Corponor\SolicitudArchivo;
use Illuminate\Http\Request;
use Corponor\Ciudad;
use Illuminate\Support\Facades\Storage;
use Corponor\User;

class CrearSolicitudPodaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \Auth::user();
        $solicitudes = Solicitud::where('user_id',$user->id)->orderBy('id','desc')->paginate(15);
        return view('lista_solicitudes',['solicitudes'=>$solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(\Auth::user()->role=="usuario"){
            $ciudades = Ciudad::all();
            return view('formulario_usuario', ['ciudades'=>$ciudades]);
        }else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearSolicitudPodaRequest $request)
    {
        //
        $usuario = \Auth::user();
        $solicitud = new Solicitud($request->except('_TOKEN'));
        $solicitud->user_id = $usuario->id;

        if($solicitud->save()){
            for($i = 0 ; $i < count($request->arbol_especie); $i++){
                $arbol = new SolicitudArbol;
                $arbol->solicitud_id = $solicitud->id;
                $arbol->especie = $request->arbol_especie[$i];
                $arbol->cantidad = $request->arbol_cantidad[$i];
                $arbol->altura= $request->arbol_altura[$i];
                $arbol->accion_realizar = $request->arbol_accion[$i];
                $arbol->save();

            }

            foreach($request->file('archivo') as $file){
                $doc = $file;
                if($doc!=null){
                    $archivo = new SolicitudArchivo();
                    $file_route = time() . '_' . $doc->getClientOriginalName();
                    Storage::disk('documentos')->put($file_route, file_get_contents($doc->getRealPath()));

                    $archivo->solicitud_id = $solicitud->id;
                    $archivo->nombre = $doc->getClientOriginalName();
                    $archivo->ruta = $file_route;
                    $archivo->save();


                }
            }
            return redirect('/home')->with(['success'=>'Formulario registrado']);
        }else{
            return redirect()->back()->with(['warning'=>'Formulario no pudo ser registrado']);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $solicitud = Solicitud::find($id);
        if($solicitud != null && $solicitud->user_id == \Auth::user()->id){
            $ciudades = Ciudad::all();
            return view('formulario_show',['solicitud'=>$solicitud, 'ciudades'=>$ciudades]);
        }else{
            return view('home')->with(['warning'=>'La solicitud que buscas no ha sido encontrada en tu lista']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
