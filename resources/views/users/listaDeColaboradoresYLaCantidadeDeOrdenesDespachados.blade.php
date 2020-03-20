@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lista de colaboradores y ordenes que despacharon</div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr>
                                <th>Colaborador</th>
                                <th>Cantidad De Ordenes Despachados</th>
                            </tr>
                            </thead>
                            @foreach($users as $user)
                                <tbody>
                                <tr>
                                    <td>{{$user->colaborador}}</td>
                                    <td>{{$user->cantidadDespachado}}</td>
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
