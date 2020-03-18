@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Promedio de ventas por departamentos</div>
                    <div class="card-body">
                        {{--                        @foreach($categories_promedios_tortas as $categories_promedios_torta)--}}
                        {{--                            {{$categories_promedios_torta->departamento}}--}}
                        {{--                        @endforeach--}}
                        <div style="width: 100%;">
                            {{$chart->container()}}
                        </div>
                        {{--                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
                        {{--                        {{$chart->script()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scriptsBarChart')
{{--    <script src="{{asset('js/chartjs-2.7.1/Chart.min.js')}}"></script>--}}
    {{$chart->script()}}
@endsection

