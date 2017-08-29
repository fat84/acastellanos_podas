@extends('layouts.app')

@section('content')
    @if(Session::get('errors')))
    <ul class="alert alert-danger">
        @foreach(Session::get('errors')->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{url('/report/save')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center">
                            <b>FORMULARIO PARA DENUNCIA CIUDADANA AMBIENTAL</b>
                            <br>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label" for="focusedInput">Dirección del suceso:</label>
                                        <input class="form-control" id="focusedInput" type="text" name="direccion"
                                               value="{{old('direccion')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Municipio: </label>
                                        <select class="form-control" name="ciudad_id">
                                            @foreach($ciudades as $ciudad)
                                                <option value="{{$ciudad->id}}"
                                                        @if(old('ciudad_id')==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('ciudad_id'))
                                            <span class="text-danger"><strong>{{ $errors->first('ciudad_id') }}</strong></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="focusedInput">Descripción de los
                                            hechos:</label>
                                        <textarea class="form-control" rows="5" name="descripcion"
                                                  value="{{old('descripcion')}}"
                                                  placeholder="Describa los hechos o motivos de la denuncia"
                                                  required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <b class="text-center">ES NECESARIO SUBIR ARCHIVOS ADJUNTOS</b><br>
                                    Los archivos que adjunte nos servirán de base probatorio para poder establecer
                                    la gravedad de los hechos y la veracidad de los mismos.
                                    <br>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-striped table-hover ">
                                        <thead>
                                        <tr>
                                            <th colspan="2">Archivos de prueba adjuntos</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody2">
                                        <tr id="a1">
                                            <td class="form-group-sm">
                                                <input type="file" name="archivo[]">
                                            </td>
                                            <td class="form-group-sm">
                                                <button type="button" class="btn btn-sm"
                                                        onclick="remove2(1)"><span
                                                            style="color:red">X</span></button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" onclick="addrow2()"
                                                        class="btn btn-sm btn-primary">AGREGAR CAMPO
                                                    PARA OTRO ARCHIVO
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-offset-4">
                                    <br><br>
                                    <button class="btn btn-primary pull-right" style="width: 100%" type="submit">Guardar
                                        formulario
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        var i = 2;

        function addrow2() {
            i = i + 1;
            $("#tbody2").append('<tr id="a' + i + '">' +
                '<td class="form-group-sm">' +
                '<input type="file" name="archivo[]">' +
                '</td>' +
                '<td class="form-group-sm"><button type="button" class="btn btn-sm" onclick="remove2(' + i + ')"> <span style="color:red">X</span></button></td>' +
                '</tr>');
        }
    </script>
@endsection