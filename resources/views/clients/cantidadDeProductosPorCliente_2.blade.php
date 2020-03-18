@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Compras por anio
                        <select name="" id="" class="float-right">
                            @foreach($clients as $client)
                                <option value="">{{$client->anio}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr>
                                <th>Cliente</th>
                                <th>Cantidad De Producto</th>
                                <th>Anio</th>
                            </tr>
                            </thead>
                            @foreach($clients as $client)
                                <tbody>
                                <tr>
                                    <td>{{$client->cliente}}</td>
                                    <td>{{$client->cantidadProducto}}</td>
                                    <td>{{$client->anio}}</td>
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
