<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('welcomeAdmin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
//    consulta 1
    Route::get('/reportes/articulos' , 'ArticleController@articulosVendidosPorMes')->name('articulos');
//    consulta 2
    Route::get('/reportes/clientes' , 'ClientController@cantidadDeProductosPorCliente_2')->name('clientes');
//    consulta 3
    Route::get('/reportes/categorias', 'CategoryController@productosVendidosPorDepartamento')->name('categorias');
//    consulta 4
    Route::get('/reportes/categories_promedio', 'CategoryController@promedioDeventasPorDepartamento')->name('categories_promedio');

//    consulta 4 barChart
    Route::get('/reportes/categories_promedio_chart', 'CategoryController@promedioDeventasPorDepartamentoBarChart')->name('categories_promedio_torta');
//    consulta 5
    Route::get('/reportes/ventas_ciudades', 'CityController@promedioVentasPorCiudades')->name('ventas_ciudades');

//    consulta 6
    Route::get('/reportes/ventas/{city_id}/articulos_promedio_ventas_ciudades', 'ArticleController@promedioDeProductosMasVendidosPorCiudades')->name('articulos_promedio_ventas_ciudades');

//    consulta 7
    Route::get('/reportes/colaboradores/ordenes_despachados', 'UserStatusOrderController@listaDeColaboradoresYLaCantidadeDeOrdenesDespachados')->name('ordenes_despachados');

//    consulta 8
    Route::get('/reportes/usuarios_verificadores' , 'UserStatusOrderController@listaDeVerificadoresYSuCantidadDeOrdenEntregado')->name('usuarios_verificadores');

//    consulta 9
    Route::get('/reportes/raitings/{article_id}/raiting_comentarios_articulos', 'RaitingArticleController@raitingsYComentariosArticulos')->name('raiting_comentarios_articulos');
//          consulta 9.1 comentarios seung el raiting (segun las evaluaciones de acuerdo a las estrellas)
            Route::get('/reportes/raiting/{article}/{raiting}/comentarios', 'RaitingArticleController@comentariosDeLosClientesPorRaiting')->name('comentarios');

//    consulta 10
    Route::get('/reportes/detalle_ordenes_por_cliente' , 'OrderDetailController@detalleDeOrdenesPorCliente')->name('articulos');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
