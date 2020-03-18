@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Compras por departamentos
                        <select name="" id="" class="float-right">
                            @foreach($categories as $category)
                                <option value="">{{$category->departamentos}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr>
                                <th>Departamentos</th>
                                <th>Catidad de Ventas</th>
                                {{--                                <th>Anio</th>--}}
                            </tr>
                            </thead>
                            @foreach($categories as $category)
                                <tbody>
                                <tr>
                                    <td>{{$category->departamentos}}</td>
                                    <td>{{$category->cantidadVentas}}</td>
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
