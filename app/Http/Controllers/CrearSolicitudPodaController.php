<?php

namespace Corponor\Http\Controllers;

use Corponor\Http\Requests\CrearSolicitudPodaRequest;
use Corponor\Solicitud;
use Corponor\SolicitudArbol;
use Corponor\SolicitudArchivo;
use Corponor\SolicitudCompensacion;
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
    public function index(Request $request)
    {
        //
        $user = \Auth::user();
        $solicitudes = null;
        $search = $request->search;
        if($search!=null && $search!=''){
            $solicitudes = Solicitud::
            whereRaw(" user_id = '".$user->id."' 
            and ( id like '%".$search."%' or estado like '%".$search."%'  or
             razon_social like '%".$search."%' or nombre_predio like '%".$search."%' ) ) ")
                ->orderBy('id', 'desc')->paginate(15);

            $solicitudes->appends(['search' => $search]);
        }else{
            $solicitudes =  Solicitud::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(15);
        }
        return view('lista_solicitudes', ['solicitudes' => $solicitudes]);
    }

    public function indexAdmin(Request $request)
    {
        //
        $user = \Auth::user();
        $search = $request->search;
        $solicitudes = null;
        if ($user->role != "admin") {
            return redirect('/solicitude/list');
        }
        if ($search != null && $search != '') {
            $solicitudes = Solicitud::where('created_at', 'LIKE', '%' . $request->search . '%')
                ->orWhere('id', 'like', '%' . $request->search . '%')
                ->orWhere('estado', 'like', '%' . $request->search . '%')
                ->orWhere('razon_social', 'like', '%' . $request->search . '%')
                ->orWhere('nombre_predio', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'desc')->paginate(15);
            $solicitudes->appends(['search' => $search]);
        } else {
            $solicitudes = Solicitud::orderBy('id', 'desc')->paginate(15);
        }

        return view('lista_solicitudes', ['solicitudes' => $solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (\Auth::user()->role == "usuario") {
            $ciudades = Ciudad::all();
            return view('formulario_usuario', ['ciudades' => $ciudades]);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrearSolicitudPodaRequest $request)
    {
        //
        $usuario = \Auth::user();
        $solicitud = new Solicitud($request->except('_TOKEN'));
        $solicitud->user_id = $usuario->id;

        if ($solicitud->save()) {
            for ($i = 0; $i < count($request->arbol_especie); $i++) {
                $arbol = new SolicitudArbol;
                $arbol->solicitud_id = $solicitud->id;
                $arbol->especie = $request->arbol_especie[$i];
                $arbol->cantidad = $request->arbol_cantidad[$i];
                $arbol->altura = $request->arbol_altura[$i];
                $arbol->accion_realizar = $request->arbol_accion[$i];
                $arbol->save();

            }

            foreach ($request->file('archivo') as $file) {
                $doc = $file;
                if ($doc != null) {
                    $archivo = new SolicitudArchivo();
                    $file_route = time() . '_' . $doc->getClientOriginalName();
                    Storage::disk('documentos')->put($file_route, file_get_contents($doc->getRealPath()));

                    $archivo->solicitud_id = $solicitud->id;
                    $archivo->nombre = $doc->getClientOriginalName();
                    $archivo->ruta = $file_route;
                    $archivo->save();


                }
            }
            return redirect('/home')->with(['success' => 'Formulario registrado']);
        } else {
            return redirect()->back()->with(['warning' => 'Formulario no pudo ser registrado']);
        }


    }

    public function storeAdmin(Request $request)
    {
        $usuario = \Auth::user();
        if ($usuario->role == "admin") {
            $solicitud = Solicitud::find($request->id);
            if ($solicitud != null) {
                $solicitud->concepto_tecnico = $request->concepto_tecnico;
                $solicitud->plazo = $request->plazo;
                $solicitud->corte_razo = $request->corte_razo;
                $solicitud->corte_parcial = $request->corte_parcial;
                $solicitud->recorte_raices = $request->recorte_raices;
                $solicitud->podas_parcial = $request->podas_parcial;
                $solicitud->traslado = $request->traslado;
                $solicitud->fecha_visita = $request->fecha_visita;
                $solicitud->observaciones = $request->observaciones;
                $solicitud->estado = $request->estado;

                if ($request->estado != 'Rechazado') {
                    $doc = $request->file('soporte_pago');
                    if ($doc != null) {
                        $file_route = time() . '_' . $doc->getClientOriginalName();
                        Storage::disk('documentos')->put($file_route, file_get_contents($doc->getRealPath()));
                        $solicitud->soporte_pago = $file_route;
                    }
                }

                for ($i = 0; $i < count($request->compensacion_numero); $i++) {
                    $compensacion = new SolicitudCompensacion();
                    $compensacion->compensacion_numero = $request->compensacion_numero[$i];
                    $compensacion->compensacion_especie = $request->compensacion_especie[$i];
                    $compensacion->compensacion_lugar = $request->compensacion_lugar[$i];
                    $compensacion->solicitud_id = $solicitud->id;
                    $compensacion->save();
                }


                if ($solicitud->save()) {
                    return redirect()->route('solicitudes_admin')->with(['success' => 'Solicitud procesada correctamente']);
                } else {
                    return redirect()->route('solicitudes_admin')->with(['success' => 'Solicitud no pudo ser procesada, intenta nuevamente']);
                }
            }
        } else {
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
        $solicitud = Solicitud::find($id);
        if ($solicitud != null && ($solicitud->user_id == \Auth::user()->id || \Auth::user()->role == "admin")) {
            $compensacion = SolicitudCompensacion::where('solicitud_id', '=', $solicitud->id)->first();
            $ciudades = Ciudad::all();
            return view('formulario_show', ['solicitud' => $solicitud, 'ciudades' => $ciudades, 'compensacion' => $compensacion]);

        } else {
            return view('home')->with(['warning' => 'La solicitud que buscas no ha sido encontrada en tu lista']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }


// ADMIN METODOS

    public
    function procesar($id)
    {
        if (\Auth::user()->role == "admin") {
            //
            $solicitud = Solicitud::find($id);
            if ($solicitud != null) {
                $ciudades = Ciudad::all();
                return view('formulario_show_admin', ['solicitud' => $solicitud, 'ciudades' => $ciudades]);
            } else {
                return view('home')->with(['warning' => 'La solicitud que buscas no ha sido encontrada en la lista']);
            }
        }
    }
}
