@extends('layout/plantilla')
@section('page-inner')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
        <div>
            <h2 class="text-white pb-2 fw-bold">Bienvenido</h2>
            <h5 class="text-white op-7 mb-2">Por favor seleccione el Software a instalar</h5>
        </div>
    </div>
@endsection
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-users fa-10x" style="color:#007bff"></i>
                                        </h5>
                                        <h1 class="card-text">FORIX PARA TIENDAS</h1>
                                        <a href="{{ url('usuario') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-users fa-10x" style="color:#007bff"></i>
                                        </h5>
                                        <h1 class="card-text">FORIX PARA EMPRESAS</h1>
                                        <a href="{{ url('usuario') }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 form-group">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <i class="fas fa-users fa-10x" style="color:#007bff"></i>
                                        </h5>
                                        <h1 class="card-text">FORIX PARA RESTAURANTES</h1>
                                        <a href="{{ url('usuario') }}" class="stretched-link"></a>
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
