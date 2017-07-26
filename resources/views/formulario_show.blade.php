@extends('layouts.app')

@section('content')

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
                        <h4 class="text-right">REGISTRO NO. {{$solicitud->id}}</h4>
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
                                                    <select class="form-control" name="tipo_solicitante" readonly="" disabled="">
                                                        <option value="0"
                                                                @if($solicitud->tipo_solicitdante==0) selected @endif >
                                                            Natural
                                                        </option>
                                                        <option value="1"
                                                                @if($solicitud->tipo_solicitdante==1) selected @endif>
                                                            Juridico
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre o Razón Social </label>
                                                    <input class="form-control" type="text" name="razon_social"
                                                           value="{{$solicitud->razon_social}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">No. Identificación (Nit o
                                                        Cédula)</label>
                                                    <input class="form-control" type="text"
                                                           name="no_identificacion"
                                                           value="{{$solicitud->no_identificacion}}" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Calidad del solicitante frente al
                                                        predio:</label>
                                                    <select class="form-control" type="text" disabled=""
                                                            name="calidad_solicitante" readonly="">
                                                        <option value="Propietario"
                                                                @if($solicitud->calidad_solicitante=="Propietario") selected @endif>
                                                            Propietario
                                                        </option>
                                                        <option value="Arrendatario"
                                                                @if($solicitud->calidad_solicitante=="Arrendatario") selected @endif>
                                                            Arrendatario
                                                        </option>
                                                        <option value="Tenedor / Poseedor"
                                                                @if($solicitud->calidad_solicitante=="Tenedor / Poseedor") selected @endif>
                                                            Tenedor / Poseedor
                                                        </option>
                                                        <option @if($solicitud->calidad_solicitante =="Otro (persona distinta al propietario que alega daños causados por árboles vecinos)") selected
                                                                @endif value="Otro (persona distinta al propietario que alega daños causados por árboles vecinos)">
                                                            Otro (persona distinta al propietario que alega daños
                                                            causados por árboles
                                                            vecinos)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Dirección Correspondencia: </label>
                                                    <input type="text" class="form-control"
                                                           name="direccion_correspondencia" maxlength="255"
                                                           value="{{$solicitud->direccion_correspondencia}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Municipio: </label>
                                                    <select class="form-control" name="ciudad_id" readonly="" disabled="">
                                                        @foreach($ciudades as $ciudad)
                                                            <option value="{{$ciudad->id}}"
                                                                    @if($solicitud->ciudad_id==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Teléfono / Celular:</label>
                                                    <input class="form-control" type="text" name="telefono"
                                                           value="{{$solicitud->telefono}}" readonly="">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label">Correo electrónico:</label>
                                                    <input class="form-control" type="text" name="correo" readonly=""
                                                           value="@if(old('correo')!=null){{old('correo')}}@else{{Auth::user()->email}}@endif">
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
                                                    <input class="form-control" type="text" name="nombre_predio" readonly=""
                                                           value="{{$solicitud->nombre_predio}}">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label class="control-label">Ubicación:</label>
                                                    <select class="form-control" name="ubicacion" readonly="" disabled="">
                                                        <option @if($solicitud->ubicacion =="Espacio Público") selected
                                                                @endif value="Espacio Público">Espacio Público
                                                        </option>
                                                        <option @if($solicitud->ubicacion=="Espacio Privado") selected
                                                                @endif value="Espacio Privado">Espacio Privado
                                                        </option>
                                                        <option @if($solicitud->ubicacion=="Rural") selected
                                                                @endif value="Rural">Rural
                                                        </option>
                                                        <option @if($solicitud->ubicacion=="Urbano") selected
                                                                @endif value="Urbano">Urbano
                                                        </option>
                                                    </select>
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
                                                                   placeholder="" value="{{$solicitud->x_cod}}" readonly=""
                                                                   aria-describedby="sizing-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group input-group">
                                                            <span class="input-group-addon"
                                                                  id="sizing-addon1"> Y: </span>
                                                            <input type="text" name="y_cod" class="form-control"
                                                                   placeholder="" value="{{$solicitud->y_cod}}" readonly=""
                                                                   aria-describedby="sizing-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label">Dirección:</label>
                                                    <input type="text" name="direccion_predio" class="form-control" readonly=""
                                                           value="{{$solicitud->direccion_predio}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Barrio:</label>
                                                    <input type="text" name="barrio_predio" class="form-control" readonly=""
                                                           value="{{$solicitud->barrio_predio}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Vereda:</label>
                                                    <input type="text" name="vereda_predio" class="form-control" readonly=""
                                                           value="{{$solicitud->vereda_predio}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Corregimiento:</label>
                                                    <input type="text" name="corregimiento_predio" readonly=""
                                                           value="{{$solicitud->corregimiento_predio}}"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Municipio: </label>
                                                    <select class="form-control" name="ciudad_predio" readonly="" disabled="">
                                                        @foreach($ciudades as $ciudad)
                                                            <option value="{{$ciudad->id}}"
                                                                    @if($solicitud->ciudad_predio==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}</option>
                                                        @endforeach
                                                    </select>
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
                                                            <?php
                                                            $arboles = $solicitud->SolicitudArbol;
                                                            ?>
                                                            @foreach($arboles as $row)
                                                                <tr>
                                                                    <td>{{$row->especie}}</td>
                                                                    <td>{{$row->cantidad}}</td>
                                                                    <td>{{$row->altura}}</td>
                                                                    <td>{{$row->accion_realizar}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
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
                                                    <?php
                                                    $archivos = $solicitud->SolicitudArchivo;
                                                    ?>
                                                    @foreach( $archivos as $row)
                                                        <tr>
                                                            <td>{{$row->nombre}}</td>
                                                            <td><a class="btn btn-sm btn-primary" href="{{url('documentos/'.$row->ruta)}}"
                                                                   target="_blank">VER</a>
                                                            </td>
                                                        </tr>

                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection