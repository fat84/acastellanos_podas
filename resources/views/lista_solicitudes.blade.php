@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Lista de solicitudes realizadas</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Fecha</th>
                                        <th>Solicitante</th>
                                        <th>Nombre predio</th>
                                        <th>estado</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($solicitudes)<=0)
                                        <tr>
                                            <td colspan="6">
                                                <center>
                                                    <br><br>

                                                    @if(Auth::user()->role != "admin")
                                                        <b>Aún no has creado ninguna solicitud.<br><br></b>
                                                        <a href="{{url('/solicitude')}}"><b>Crear una solicitud</b></a>
                                                    @else
                                                        <b>Aún no se ha creado ninguna solicitud.<br><br></b>
                                                    @endif
                                                    <br><br>
                                                </center>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach($solicitudes as $solicitud)
                                        <tr>
                                            <td>{{$solicitud->id}}</td>
                                            <td>{{\date('Y-m-d',date_timestamp_get($solicitud->created_at))}}</td>
                                            <td>{{$solicitud->razon_social}}</td>
                                            <td>{{$solicitud->nombre_predio}}</td>
                                            <td>{{$solicitud->estado}}</td>
                                            <td><a class="btn btn-sm btn-primary"
                                                   @if(Auth::user()->role=="admin" && $solicitud->estado == "Pendiente")
                                                   href="{{route('solicitudes_procesar_admin',['id'=>$solicitud->id])}}">Procesar</a>

                                                @elseif($solicitud->estado == "Aprobado - Por registrar pago" && Auth::user()->role == "admin")
                                                    href="{{route('solicitudes_procesar_admin',['id'=>$solicitud->id])}}
                                                    ">Subir pdf para pago</a>
                                                @elseif($solicitud->estado != "Pendiente" && Auth::user()->role=="admin")
                                                    href="{{route('solicitudes_procesar_admin',['id'=>$solicitud->id])}}
                                                    ">Procesar</a>
                                                @else
                                                    href="{{url('/solicitude/show',['id'=>$solicitud->id])}}">ver</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-12">
                                {{ $solicitudes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::user()->rol == "admin")
        <!-- Modal -->
        <form method="post" action="{{url('admin/solicitude/save')}}"
              enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Adjuntar documento para pago</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="focusedInput">Seleccione el archivo a adjunto
                                            en su equipo:</label>
                                        <input class="form-control" id="" type="file" value="" name="archivo">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Subir documento</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    @endif
@endsection