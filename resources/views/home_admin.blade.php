@extends('layouts.app')
@section('styles')
    <style>
        .item{
            cursor: pointer !important;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Panel de opciones</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3" onclick="javascript:window.location='{{route('solicitudes_admin')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item" >
                                    <div class="panel-body text-center">
                                        @if($cant_solicitudes>0)
                                            <span class="badge affix success pull-right">{{$cant_solicitudes}}</span>
                                        @endif
                                        <img src="{{asset('img/clipboard.svg')}}" class="icon-img"/>
                                        <span class="icon-text"><br>Solicitudes permiso forestal</span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3" onclick="javascript:window.location='{{route('denuncias_admin')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item">
                                    <div class="panel-body text-center ">
                                        @if($cant_denuncias>0)
                                            <span class="badge affix success pull-right">{{$cant_denuncias}}</span>
                                        @endif
                                        <img src="{{asset('img/clipboard.svg')}}" class="icon-img"/>
                                        <span class="icon-text"><br>Denuncias ciudadanas</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" onclick="javascript:window.location='{{url('/report')}}'" style="cursor: pointer">
                                <div class="panel panel-success panel-option btn-info item" style="z-index: 1;">
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
