@extends('layouts.app')

@section('content')
    <form method="post" action="{{url('solicitude/save')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @if(Session::get('errors')))
        <ul class="alert alert-danger">
            @foreach(Session::get('errors')->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading text-center">
                            <b>FORMULARIO DE SOLICITUD PERMISO FORESTAL PARA ÁRBOLES AISLADOS</b>
                            <br>
                            Base Legal: Decreto 1076 de 2015 (Art. 2.2.1.1.9.1 - 2.2.1.1.9.6) MPO-02-F-05-1 - Versión 9
                            -
                            15/09/2016
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            1. INFORMACIÓN DEL SOLICITANTE
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Tipo solicitante:</label>
                                                        <select class="form-control" name="tipo_solicitante">
                                                            <option value="0"
                                                                    @if(old('tipo_solicitdante')==0) selected @endif >
                                                                Natural
                                                            </option>
                                                            <option value="1"
                                                                    @if(old('tipo_solicitdante')==1) selected @endif>
                                                                Juridico
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('tipo_solicitante'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('tipo_solicitante') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Nombre o Razón Social </label>
                                                        <input class="form-control" type="text" name="razon_social"
                                                               value="{{old('razon_social')}}">
                                                        @if ($errors->has('razon_social'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('razon_social') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">No. Identificación (Nit o
                                                            Cédula)</label>
                                                        <input class="form-control" type="text"
                                                               name="no_identificacion"
                                                               value="{{old('no_identificacion')}}">
                                                        @if ($errors->has('no_identificacion'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('no_identificacion') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Calidad del solicitante frente al
                                                            predio:</label>
                                                        <select class="form-control" type="text"
                                                                name="calidad_solicitante">
                                                            <option value="Propietario"
                                                                    @if(old('calidad_solicitante')=="Propietario") selected @endif>
                                                                Propietario
                                                            </option>
                                                            <option value="Arrendatario"
                                                                    @if(old('calidad_solicitante')=="Arrendatario") selected @endif>
                                                                Arrendatario
                                                            </option>
                                                            <option value="Tenedor / Poseedor"
                                                                    @if(old('calidad_solicitante')=="Tenedor / Poseedor") selected @endif>
                                                                Tenedor / Poseedor
                                                            </option>
                                                            <option @if(old('calidad_solicitante')=="Otro (persona distinta al propietario que alega daños causados por árboles vecinos)") selected
                                                                    @endif value="Otro (persona distinta al propietario que alega daños causados por árboles vecinos)">
                                                                Otro (persona distinta al propietario que alega daños
                                                                causados por árboles
                                                                vecinos)
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('calidad_solicitante'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('calidad_solicitante') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Dirección Correspondencia: </label>
                                                        <input type="text" class="form-control"
                                                               name="direccion_correspondencia" maxlength="255"
                                                               value="{{old('direccion_correspondencia')}}">
                                                        @if ($errors->has('direccion_correspondencia'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('direccion_correspondencia') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Municipio: </label>
                                                        <select class="form-control" name="ciudad_id">
                                                            @foreach($ciudades as $ciudad)
                                                                <option value="{{$ciudad->id}}"
                                                                        @if(old('ciudad_id')==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('ciudad_id'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('ciudad_id') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Teléfono / Celular:</label>
                                                        <input class="form-control" type="text" name="telefono"
                                                               value="{{old('telefono')}}">
                                                        @if ($errors->has('telefono'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('telefono') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Correo electrónico:</label>
                                                        <input class="form-control" type="text" name="correo"
                                                               value="@if(old('correo')!=null){{old('correo')}}@else{{Auth::user()->email}}@endif">
                                                        @if ($errors->has('correo'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('correo') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            2. INFORMACIÓN DEL PREDIO (Ubicación de los arboles)
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Nombre del predio:</label>
                                                        <input class="form-control" type="text" name="nombre_predio"
                                                               value="{{old('nombre_predio')}}">
                                                        @if ($errors->has('nombre_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('nombre_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label class="control-label">Ubicación:</label>
                                                        <select class="form-control" name="ubicacion">
                                                            <option @if(old('ubicacion')=="Espacio Público") selected
                                                                    @endif value="Espacio Público">Espacio Público
                                                            </option>
                                                            <option @if(old('ubicacion')=="Espacio Privado") selected
                                                                    @endif value="Espacio Privado">Espacio Privado
                                                            </option>
                                                            <option @if(old('ubicacion')=="Rural") selected
                                                                    @endif value="Rural">Rural
                                                            </option>
                                                            <option @if(old('ubicacion')=="Urbano") selected
                                                                    @endif value="Urbano">Urbano
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('ubicacion'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('ubicacion') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Coordenadas para ejecución de obras
                                                            o
                                                            proyectos</label>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group">
                                                            <span class="input-group-addon"
                                                                  id="sizing-addon1"> X: </span>
                                                                <input type="text" name="x_cod" class="form-control"
                                                                       placeholder="" value="{{old('x_cod')}}"
                                                                       aria-describedby="sizing-addon1">
                                                                @if ($errors->has('x_cod'))
                                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('x_cord') }}</strong>
                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="input-group input-group">
                                                            <span class="input-group-addon"
                                                                  id="sizing-addon1"> Y: </span>
                                                                <input type="text" name="y_cod" class="form-control"
                                                                       placeholder="" value="{{old('y_cod')}}"
                                                                       aria-describedby="sizing-addon1">
                                                                @if ($errors->has('y_cod'))
                                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('y_cord') }}</strong>
                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="control-label">Dirección:</label>
                                                        <input type="text" name="direccion_predio" class="form-control"
                                                               value="{{old('direccion_predio')}}">
                                                        @if ($errors->has('direccion_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('direccion_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Barrio:</label>
                                                        <input type="text" name="barrio_predio" class="form-control"
                                                               value="{{old('barrio_predio')}}">
                                                        @if ($errors->has('barrio_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('barrio_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Vereda:</label>
                                                        <input type="text" name="vereda_predio" class="form-control"
                                                               value="{{old('vereda_predio')}}">
                                                        @if ($errors->has('vereda_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('vereda_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Corregimiento:</label>
                                                        <input type="text" name="corregimiento_predio"
                                                               value="{{old('corregimiento_predio')}}"
                                                               class="form-control">
                                                        @if ($errors->has('corregimiento_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('corregimiento_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="control-label">Municipio: </label>
                                                        <select class="form-control" name="ciudad_predio">
                                                            @foreach($ciudades as $ciudad)
                                                                <option value="{{$ciudad->id}}"
                                                                        @if(old('ciudad_predio')==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('ciudad_predio'))
                                                            <span class="text-danger">
                                                            <strong>{{ $errors->first('ciudad_predio') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-body" style="padding: 0">
                                                            <table class="table table-striped table-hover "
                                                                   style="margin: 0">
                                                                <thead>
                                                                <tr class="info">
                                                                    <th style="width: 55%">Especie</th>
                                                                    <th style="width: 15%">Cantidad</th>
                                                                    <th style="width: 15%">Altura total <span
                                                                                style="font-size: 0.82em">(Aproximada)</span>
                                                                    </th>
                                                                    <th style="width: 15%">Acción a realizar</th>
                                                                    <th></th>
                                                                </tr>
                                                                </thead>
                                                                <tbody id="tbody">
                                                                <tr id="1">
                                                                    <td class="form-group-sm"><input
                                                                                class="form-control"
                                                                                name="arbol_especie[]"  required>
                                                                    </td>
                                                                    <td class="form-group-sm"><input
                                                                                class="form-control"
                                                                                name="arbol_cantidad[]" required>
                                                                    </td>
                                                                    <td class="form-group-sm"><input
                                                                                class="form-control"
                                                                                name="arbol_altura[]" required>
                                                                    </td>
                                                                    <td class="form-group-sm"><select
                                                                                class="form-control"
                                                                                name="arbol_accion[]">
                                                                            <option value="Tala">Tala</option>
                                                                            <option value="Poda">Poda</option>
                                                                            <option value="Trasplante ó Reubicación">
                                                                                Trasplante ó Reubicación
                                                                            </option>
                                                                        </select></td>
                                                                    <td class="form-group-sm">
                                                                        <button type="button" class="btn btn-sm"
                                                                                onclick="remove(1)"><span
                                                                                    style="color:red">X</span></button>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td>
                                                                        <button class="btn btn-sm btn-primary"
                                                                                type="button"
                                                                                onclick="addRow()">Agregar una fila
                                                                            adicional a la tabla
                                                                        </button>
                                                                    </td>
                                                                    <td colspan="3"></td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            2. DOCUMENTACIÓN REQUERIDA
                                        </div>
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="panel panel-primary">
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-12 text-justify">
                                                                    <B>DOCUMENTACIÓN PERMISO FORESTAL PARA ARBOLES
                                                                        AISLADOS</B>
                                                                    <ul>
                                                                        <li>Copia de la cedula de ciudadania del
                                                                            propietario del predio (<b>Persona
                                                                                natural</b>)
                                                                        </li>
                                                                        <li>Si el propietario actua en calidad de <b>arrendatario</b>
                                                                            debe presentar codia del <b>contrato de
                                                                                arrendamiento</b></li>
                                                                        <li>Certificado de Libertad y Tradición vigente
                                                                            (<b>Máximo 3 meses de expedido)</b></li>
                                                                        <li>Rut(<b>Sociedades, instituciones educativas,
                                                                                alcaldías</b>)
                                                                        </li>
                                                                        <li>Registro cámara de comercio(<b>Sociedades,
                                                                                empresas</b>)
                                                                        </li>
                                                                        <li>Acta de nombramiento del representante
                                                                            legal(<b>Instituciones educativas, conjuntos
                                                                                residenciales, condominios y juntas de
                                                                                acción comunal</b>)
                                                                        </li>
                                                                        <li>Acta de posesión y credencial (<b>Alcaldes
                                                                                municipales</b>)
                                                                        </li>
                                                                        <li>Personería jurídica (<b>Juntas de acción
                                                                                comunal, conjuntos residenciales,
                                                                                condominios</b>)
                                                                        </li>
                                                                        <li>Pago de visita técnica (<b>Subdirección
                                                                                financiera CORPONOR - primer piso)</b>
                                                                            por su comodidad el pgao lo puede efectuar a
                                                                            través de canales electrónicos como son:
                                                                            Tarjetas de crédito o débito o en efectivo)
                                                                        </li>
                                                                    </ul>
                                                                    <b>CUANDO SEA PARA TALA: PARA LA EJECUCCIÓN DE OBRAS
                                                                        PÚBLICAS O PRIVADAS / PROYECTOS</b>
                                                                    <ul>
                                                                        <li>Copia de la licencia de construcción</li>
                                                                        <li>Inventario forestal que incluya:
                                                                            identificación de las especies a intervenir,
                                                                            número de individuos, georreferenciación,
                                                                            alturas, diámetro a la altura del pecho
                                                                            (DAP) y volumen en M3. (<b>Empresas, Unión
                                                                                temporal, alcaldías</b>)
                                                                        </li>
                                                                    </ul>
                                                                    <i>Para mayor información sobre el tramite de la
                                                                        solicitud favor comunicarse al PBX 5828484 -
                                                                        Ext.250 con la funcionaria <b>Elizabeth Moncada
                                                                            Jaimes</b> de la subdirección de desarrollo
                                                                        sectorial sostenible</i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-striped table-hover ">
                                                        <thead>
                                                        <tr>
                                                            <th colspan="2">Archivos adjuntos al formulario</th>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-lg-offset-4">
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
        var i = 1;
        function remove(id) {
            $("#" + id).remove();
        }
        function remove2(id) {
            $("#a" + id).remove();
        }
        function addRow() {
            i = i + 1;
            $("#tbody").append('<tr id="' + i + '">' +
                '<td class="form-group-sm"><input class="form-control" name="arbol_especie[]" required>' +
                '</td>' +
                '<td class="form-group-sm"><input class="form-control" name="arbol_cantidad[]" required>' +
                '</td>' +
                '<td class="form-group-sm"><input class="form-control" name="arbol_altura[]" required>' +
                '</td>' +
                '<td class="form-group-sm"><select class="form-control" name="arbol_accion[]">' +
                '<option value="Tala">Tala</option>' +
                '<option value="Poda">Poda</option>' +
                '<option value="Trasplante ó Reubicación">Trasplante ó Reubicación </option>' +
                '</select></td>' +
                '<td class="form-group-sm"><button type="button" class="btn btn-sm" onclick="remove(' + i + ')"> <span style="color:red">X</span></button></td>' +
                '</tr>');
        }
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