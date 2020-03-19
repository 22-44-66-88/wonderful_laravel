@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Ciudades</div>
                    <ul class="list-group">
                        @foreach($cities as $city)
                            <li class="list-group-item">
                                <a href="/reportes/ventas/{{$city->id}}/articulos_promedio_ventas_ciudades">{{$city->city}}</a>
                            </li>
                        @endforeach
                        <div class="card-link">{{$cities->links()}}</div>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Promedio de productos mas vendidos por ciudades
                        <label class="float-right">Ciudad : {{$articles[0]->ciudad}}</label>
                    </div>
                    <div class="card-body">
                        <div style="width: 100%;">
                            {{$barchart->container()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptsBarChart')
{{--    <script src="{{asset('js/chart/Chart.min.js')}}"></script>--}}
    {{$barchart->script()}}
@endsection
@section('scripts')
    <script type="text/javascript">
        // $("#city_id").select2();
        // $(document).ready(function () {
        //     $('#city_id').select2();
        // });
    </script>
@endsection
