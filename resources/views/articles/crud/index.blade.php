@extends('layouts.menuAdmin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Articulos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                        <li class="breadcrumb-item active">Articulos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                       <div class="card-header">
                           {{-- <h3 class="card-title float-left">DataTable with default left</h3> --}}
                           <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-lg">
                                <i class="fas fa-plus-circle"></i>
                                Agregar
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-striped elevation-2">
                                <thead>
                                <tr>
                                    <th class="text-center">&ensp; ID</th>
                                    <th>Articulo</th>
                                    <th>Fabricante</th>
                                    <th>Stock</th>
                                    <th>Sub Categoria</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <th class="text-center">{{$article->id}}</th>
                                            <td>{{$article->article}}</td>
                                            <td>{{$article->marker}}</td>
                                            <td>{{$article->stock}}</td>
                                            <td>{{$article->sub_category}}</td>
                                            <td>{{$article->category}}</td>
                                            <td class="text-center py-0 align-middle">
                                                <div class="btn-group btn-group-sm">
                                                  <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                  <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th class="text-center">&ensp; ID</th>
                                    <th>Articulo</th>
                                    <th>Fabricante</th>
                                    <th>Stock</th>
                                    <th>Sub Categoria</th>
                                    <th>Categoria</th>
                                    <th>Opciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Large Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('articles.store') }}" method="POST">
                            @csrf 
                            <div class="modal-body">
                                <!-- SELECT2 EXAMPLE -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label>Sub Categoria:</label>
                                            <select name="sub_category_id" class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                                <option selected="selected">Seleccione una subcategoria</option>
                                            @foreach ($sub_categories as $sub_category)
                                                <option value="{{ $sub_category->id }}">
                                                    {{ $sub_category->sub_category }}
                                                </option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        {{--  <div class="form-group">
                                            <label>Categoria:</label>
                                            <select class="form-control select2 select2-info" data-dropdown-css-class="select2-info" style="width: 100%;">
                                            <option selected="selected">Alabama</option>
                                            <option>Alaska</option>
                                            <option>California</option>
                                            <option>Delaware</option>
                                            <option>Tennessee</option>
                                            <option>Texas</option>
                                            <option>Washington</option>
                                            </select>
                                        </div>  --}}
                                        <!-- /.form-group -->

                                        <div class="form-group">
                                            <strong>Articulo:</strong>
                                            <input type="text" name="title" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <strong>Marker:</strong>
                                            <input type="text" name="marker" class="form-control" placeholder="Marker">
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <textarea name="description" class="form-control" cols="5" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <strong>Stock:</strong>
                                            <input type="number" name="stock" class="form-control" placeholder="Stock">
                                        </div>
                                    </div>
                                    <!-- /.col -->    
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button  class="btn btn-default" data-dismiss="modal">Close</button>
                                <button  class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
