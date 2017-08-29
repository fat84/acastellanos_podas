@extends('layouts.app')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Lista de denuncias ciudadanas realizadas</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>Fecha</th>
                                        <th>Dirección</th>
                                        <th>Municipio</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($denuncias)<=0)
                                        <tr>
                                            <td colspan="6">
                                                <center>
                                                    <br><br>

                                                    @if(Auth::user()->role != "admin")
                                                        <b>Aún no has creado ninguna solicitud.<br><br></b>
                                                        <a href="{{url('/report')}}"><b>Crear una denuncia</b></a>
                                                    @else
                                                        <b>Aún no se ha creado ninguna denuncia.<br><br></b>
                                                    @endif
                                                    <br><br>
                                                </center>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach($denuncias as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{\date('Y-m-d',date_timestamp_get($row->created_at))}}</td>
                                            <td>{{$row->direccion}}</td>
                                            <td>{{$row->ciudad->nombre_ciudad}}</td>
                                            <td>Pendiente</td>
                                            <td><a class="btn btn-sm btn-primary" href="{{url('/report/show',['id'=>$row->id])}}">ver</a> </td>
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
                                {{ $denuncias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection