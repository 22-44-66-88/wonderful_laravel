<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
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
    Route::get('/reportes/articulos_promedio_ventas_ciudades', 'ArticleController@promedioDeProductosMasVendidosPorCiudades')->name('articulos_promedio_ventas_ciudades');
//    sub rutas para la consulta  6 para listar por categorias
           Route::get('/reporte/ventas/{city_id}/ciudades','ArticleController@promedioVentasPorCiudades_6')->name('ventas');

//    consulta 8
Route::get('/reportes/usuarios_verificadores' , 'UserStatusOrderController@listaDeVerificadoresYSuCantidadDeOrdenEntregado')->name('usuarios_verificadores');

//    consulta 9
    Route::get('/reportes/raiting_comentarios_articulos', 'RaitingArticleController@raitingsYComentariosArticulos')->name('raiting_comentarios_articulos');
//    sub rutas para la consulta  9 para listar por articulos los raiting y los comentarios
           Route::get('/reportes/raitings/{article_id}/comentarios', 'RaitingArticleController@raitingsYComentarios')->name('comentarios');

});
