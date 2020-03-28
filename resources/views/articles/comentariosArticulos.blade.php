@extends('layouts.menuAdmin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Raitings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="/reportes/raitings/raiting_comentarios_articulos">Articulos</a></li>
                        <li class="breadcrumb-item active">Raitings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <section class="content">
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
                                    <th>Cliente</th>
                                    <th>Commentario </th>
                                    <th>Fecha </th>
{{--                                    <th>Porcentaje</th>--}}
{{--                                    <th>Ver Comentario</th>--}}
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($comentarios as $comentario)
                                    <tr>
                                        <td>{{$comentario->cliente}}</td>
                                        <td>{{$comentario->comentario}}</td>
                                        <td>{{$comentario->fecha}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Commentario </th>
                                    <th>Fecha </th>
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
    </section>
@endsection
