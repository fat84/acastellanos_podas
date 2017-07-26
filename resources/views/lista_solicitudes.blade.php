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
                                                    <b>Aún no has creado ninguna solicitud.<br><br></b>
                                                    <a href="{{url('/solicitude')}}"><b>Crear una solicitud</b></a>
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
                                            <td>Pendiente</td>
                                            <td><a class="btn btn-sm btn-primary" href="{{url('/solicitude/show',['id'=>$solicitud->id])}}">ver</a> </td>
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
@endsection