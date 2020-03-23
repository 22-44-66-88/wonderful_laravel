@extends('layouts.menuAdmin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ordenes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item active">Clientes</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
        {{--                <div class="card-header">--}}
        {{--                    <h3 class="card-title">DataTable with default features</h3>--}}
        {{--                </div>--}}
                        <!-- /.card-header -->
                        <div class="card-body">
{{--                            table-striped projects  otro estilo=> table-bordered--}}
                            <table id="example1" class="table table-striped elevation-2">
                                <thead>
                                <tr>
                                    <th class="text-center">&ensp; ID</th>
                                    <th>Cliente</th>
                                    <th>CI</th>
                                    <th>Activo</th>
                                    <th>Ver Ordenes</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <th class="text-center">{{$client->id}}</th>
                                            <td>{{$client->cliente}}</td>
                                            <td>{{$client->ci}}</td>
                                            @if($client->activo == 'activo')
                                                <td><span class="right badge badge-success">{{$client->activo}}</span></td>
                                            @endif
                                            @if($client->activo == 'inactivo')
                                                <td><span class="right badge badge-danger">{{$client->activo}}</span></td>
                                            @endif
                                            <td>
                                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> ver</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>CI</th>
                                    <th>Activo</th>
                                    <th>Ver Ordenes</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
