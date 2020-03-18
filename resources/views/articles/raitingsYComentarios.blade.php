@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
{{--                        <div class="form-group row">--}}
                            <div class="col-md-9 row">
                                <label class="float-left">Productos</label>
{{--                                <input id="search" type="text" class="form-control" name="password" placeholder="Buscar Producto" required>--}}
                            </div>
{{--                            <button  class="btn btn-outline-secondary btn-sm text-md-left">{{ __('Buscar') }}</button>--}}
{{--                        </div>--}}
                    </div>
                    <ul class="list-group">
                        @foreach($articles as $article)
                            <li class="list-group-item">
                                <a href="/reportes/raitings/{{$article->id}}/comentarios">{{$article->title}}</a>
                            </li>
                        @endforeach
                        <div class="card-link">{{$articles->links()}}</div>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
{{--                        Raiting y comentarios de los productos--}}
                        <label class="float-left">Producto : {{$raitings[0]->article}}</label>
                    </div>
                    <div class="card-body">
                        <table class="table border table-responsive-sm">
                            <thead class="card-header">
                            <tr class="text-dark">
                                {{--                                <th>Producto</th>--}}
                                {{--                                <th>Cliente</th>--}}
                                <th>Raiting</th>
                                <th>Comentario</th>
                            </tr>
                            </thead>
                            @foreach($raitings as $raiting)
                                <tbody>
                                <tr>
                                    {{--                                    <td>{{$raiting->producto}}</td>--}}
                                    {{--                                    <td>{{$raiting->cliente}}</td>--}}
                                    @if($raiting->raiting == 5)
{{--                                        <td>{{$raiting->raiting}}</td>--}}
                                        <td><img src="{{asset('/stars/5stars.jpg')}}" style="width: 110px;height: 19px;"></td>
                                    @endif
                                    @if($raiting->raiting == 4)
                                        <td><img src="{{asset('/stars/4stars.jpg')}}" style="width: 110px;height: 19px;"></td>
                                    @endif
                                    @if($raiting->raiting == 3)
                                        <td><img src="{{asset('/stars/3stars.jpg')}}" style="width: 110px;height: 19px;"></td>
                                    @endif
                                    @if($raiting->raiting == 2)
                                        <td><img src="{{asset('/stars/2stars.jpg')}}" style="width: 110px;height: 19px;"></td>
                                    @endif
                                    @if($raiting->raiting == 1)
                                        <td><img src="{{asset('/stars/1stars.jpg')}}" style="width: 110px;height: 19px;"></td>
                                    @endif

                                    <td>{{$raiting->comentario}}</td>
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
