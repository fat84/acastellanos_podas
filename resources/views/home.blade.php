@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Panel de opciones</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 item" onclick="javascript:window.location='{{url('/solicitude/list')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item" >
                                    <div class="panel-body text-center">
                                        @if($cant_solicitudes>0)
                                            <span class="badge affix success pull-right">{{$cant_solicitudes}}</span>
                                        @endif
                                        <img src="{{asset('img/clipboard.svg')}}" class="icon-img"/>
                                        <span class="icon-text"><br>Mis solicitudes permiso forestal</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 item" onclick="javascript:window.location='{{url('/solicitude')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item">
                                    <div class="panel-body text-center">
                                        <img src="{{asset('img/trees.svg')}}" class="icon-img"/>

                                        <span class="icon-text"><br>Crear solicitud permiso forestal</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 item" onclick="javascript:window.location='{{url('/report/list')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item">
                                    <div class="panel-body text-center">
                                        @if($cant_denuncias>0)
                                            <span class="badge affix success pull-right">{{$cant_denuncias}}</span>
                                        @endif
                                        <img src="{{asset('img/clipboard.svg')}}" class="icon-img"/>
                                        <span class="icon-text"><br>Mis denuncias ciudadanas</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 item" onclick="javascript:window.location='{{url('/report')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item">
                                    <div class="panel-body text-center">
                                        <img src="{{asset('img/siren.svg')}}" class="icon-img"/>

                                        <span class="icon-text"><br>Crear denuncia ciudadana</span>
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


@section('scripts')
    <script>

    </script>
@endsection