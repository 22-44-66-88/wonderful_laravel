@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ventas Por Mes
                        <select name="" id="" class="float-right">
                            @foreach($articles as $article)
                                <option value="">{{$article->mes}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr class="text-dark">
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Mes</th>
                            </tr>
                            </thead>
                            @foreach($articles as $article)
                                <tbody>
                                <tr>
                                    <td>{{$article->producto}}</td>
                                    <td>{{$article->cantidad}}</td>
                                    <td>{{$article->mes}}</td>
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
