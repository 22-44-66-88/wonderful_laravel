@extends('layouts.menuAdmin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Promedio de ventas por ciudades</div>
                    <div class="card-body">
                        <div style="width: 100%;">
                            {{$barchart->container()}}
                        </div>
                        {{--                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>--}}
                        {{--                        {{$barchart->script()}}--}}
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

