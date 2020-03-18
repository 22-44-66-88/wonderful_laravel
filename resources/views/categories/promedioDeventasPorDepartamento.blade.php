@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Promedio de ventas por departamentos
                        <select name="" id="" class="float-right">
                            @foreach($categories_promedios as $categories_promedio)
                                <option value="">{{$categories_promedio->departamento}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr>
                                <th>Departamentos</th>
                                <th>Productos</th>
                                <th>Cantidad</th>
                                <th>Total Por Ventas</th>
                                {{--                                <th>Anio</th>--}}
                            </tr>
                            </thead>
                            @foreach($categories_promedios as $categories_promedio)
                                <tbody>
                                <tr>
                                    <td>{{$categories_promedio->departamento}}</td>
                                    <td>{{$categories_promedio->producto}}</td>
                                    <td>{{$categories_promedio->cantidad}}</td>
                                    <td>{{$categories_promedio->totalVenta}}</td>
                                    {{--                                    <td>{{$client->anio}}</td>--}}
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
