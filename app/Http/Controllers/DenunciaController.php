<?php

namespace Corponor\Http\Controllers;

use Corponor\Ciudad;
use Corponor\Denuncia;
use Corponor\DenunciaArchivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DenunciaController extends Controller
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
        $user = \Auth::user()->id;
        $search = $request->search;
        if($search != null && $search!= ''){
            $denuncias = Denuncia::whereRaw("user_id = '".$user."' and ( id like '%".$search."%' or created_at like '%".$search."%' or direccion like '%".$search."%' )")
                ->orderBy('id','desc')
                ->paginate(15);
            $denuncias->appends(['search' => $search]);
        }else{
            $denuncias = Denuncia::where('user_id', '=', $user)->orderBy('id','desc')->paginate(15);
        }

        return view('lista_denuncias', ['denuncias'=>$denuncias]);
    }
    public function indexAdmin(Request $request)
    {
        $denuncias = null;
        $search = $request->search;
        if(\Auth::user()->role != "admin"){
            return redirect('/report/list');
        }
        if($search != null && $search!= ''){
            $denuncias = Denuncia::where('created_at', 'LIKE', '%'.$request->search . '%')
            ->orWhere('id', 'like', '%'. $request->search .'%')
            ->orWhere('direccion', 'like','%'. $request->search . '%')
            ->orderBy('id','desc')
            ->paginate(15);

            $denuncias->appends(['search' => $search]);
        }else{
            $denuncias = Denuncia::orderBy('id','desc')->paginate(15);
        }

        return view('lista_denuncias', ['denuncias'=>$denuncias, 'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::all();
        return view('denuncia', ['ciudades'=>$ciudades]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = \Auth::user();
        $denuncia = new Denuncia();
        $denuncia->direccion = $request->direccion;
        $denuncia->user_id = $user->id;
        $denuncia->ciudad_id = $request->ciudad_id;
        $denuncia->descripcion = $request->descripcion;

        $si_archivos=0;
        foreach($request->file('archivo') as $file){
            if($si_archivos==0) {
                if ($denuncia->save() == null) {
                    return redirect()->back()->with(['warning' => 'Tu denuncia no pudo ser guardada.']);
                }
                $si_archivos += 1;
            }
                $doc = $file;
                if($doc!=null){
                    $archivo = new DenunciaArchivo();
                    $file_route = time() . '_' . $doc->getClientOriginalName();
                    Storage::disk('documentos')->put($file_route, file_get_contents($doc->getRealPath()));

                    $archivo->denuncia_id = $denuncia->id;
                    $archivo->nombre = $doc->getClientOriginalName();
                    $archivo->ruta = $file_route;
                    $archivo->save();
                }
        }
        if($si_archivos>0 && $denuncia != null){
            return redirect('/home')->with(['success'=>'Su denuncia ha sido registrada correctamente']);
        }else{
            return redirect('/home')->with(['warning'=>'Algo salio mal, intentalo de nuevo']);
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
        $denuncia = Denuncia::find($id);
        if($denuncia != null && $denuncia->user_id == \Auth::user()->id){
            $ciudades = Ciudad::all();
            return view('denuncia_show',['denuncia'=>$denuncia, 'ciudades'=>$ciudades]);
        }else{
            return view('home')->with(['warning'=>'La denuncia que buscas no ha sido encontrada en tu lista']);
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
