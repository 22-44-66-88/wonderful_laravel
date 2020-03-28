<?php

namespace App\Http\Controllers;

use App\Article;
use App\Charts\BarChart;
use App\City;
use App\Client;
use App\CommentaryArticle;
use App\RaitingArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaitingArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RaitingArticle  $raitingArticle
     * @return \Illuminate\Http\Response
     */
    public function show(RaitingArticle $raitingArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RaitingArticle  $raitingArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(RaitingArticle $raitingArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RaitingArticle  $raitingArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RaitingArticle $raitingArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RaitingArticle  $raitingArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(RaitingArticle $raitingArticle)
    {
        //
    }

    public function raitingsYComentariosArticulos(Article $articles , Request $request){
        if ($request->user()->authorizeRole(['administrador'])) {
            $articles = DB::select("select * from articles");

            return view('articles.raitingsYComentariosArticulos',compact('articles'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
    }

    public function raitingsArticulos($article_id , Article $articles , Request $request){
        if ($request->user()->authorizeRole(['administrador'])) {

            $raitings = DB::select(
                "
                select a.title as article ,ra.raiting as raiting ,count(ra.client_id)  cantidadCliente, ra.raiting * 100  / count(ra.client_id) as porcentaje
                from raiting_articles ra inner join clients c on ra.client_id = c.id
                     inner join commentary_articles ca on c.id = ca.client_id
                     inner join articles a on ra.article_id = a.id
                where a.id = $article_id
                group by ra.raiting
                order by ra.raiting desc ;
            "
            );

            return view('articles.raitingsArticulos',compact('raitings'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
    }

    public function comentariosArticulos($raiting, CommentaryArticle $comentarios , Request $request){
        if ($request->user()->authorizeRole(['administrador'])) {
//        raitings

            $comentarios = DB::select(
                "
                select concat_ws(' ',c.last_name,c.mother_last_name,c.first_name,c.second_name) as cliente,
                       ca.comment as comentario , ca.created_at as fecha
                from raiting_articles ra inner join clients c on ra.client_id = c.id
                     inner join commentary_articles ca on c.id = ca.client_id
                     inner join articles a on ra.article_id = a.id
                where ra.raiting = $raiting
                group by ca.comment , ca.created_at , c.id
                order by ca.created_at desc ;
            "
            );

//            $barchart = new BarChart();
//            foreach ($raitings as $raitingkey){
//                $barchart->dataset(
//                    $raitingkey->raiting,'bar',[$raitingkey->porcentaje]
//                );
//            }

            return view('articles.comentariosArticulos',compact('comentarios'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }

    }
}
