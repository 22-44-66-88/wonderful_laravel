<?php

namespace App\Http\Controllers;

use App\Article;
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

    public function raitingsYComentariosArticulos($article_id , Article $articles , Request $request){
        $request->user()->authorizeRole(['administrador']);


        $articles = DB::table('articles')->select('*')->paginate(5);

        $raitings = DB::select(
            "
                select a.title as article, ra.raiting as raiting , count(c.id) as cantidadCliente , ra.raiting * count(c.id) / 100 as porcentaje
                from clients c join raiting_articles ra on c.id = ra.client_id
                    join commentary_articles ca on c.id = ca.client_id
                    join articles a on ra.article_id = a.id
                    join order_details od on a.id = od.article_id
                    join orders o on c.id = o.client_id
                    join status_orders so on o.id = so.order_id
                    join process_orders po on so.process_order_id = po.id
                where a.id = $article_id
                and po.id = 4
                group by raiting
                order by ra.raiting desc;
            "
        );

        return view('articles.raitingsYComentariosArticulos',compact('raitings','articles'));
    }

    public function comentariosDeLosClientesPorRaiting($article ,$raiting, CommentaryArticle $comentarios , Request $request){
        $request->user()->authorizeRole(['administrador']);
        $articles = DB::table('articles')->select('*')->paginate(5);
//        raitings
        $raitings = DB::select(
            "
                select a.title as articulo, ra.raiting as raiting , count(c.id) as cantidadCliente , ra.raiting * count(c.id) / 100 as porcentaje
                from clients c join raiting_articles ra on c.id = ra.client_id
                    join commentary_articles ca on c.id = ca.client_id
                    join articles a on ra.article_id = a.id
                    join order_details od on a.id = od.article_id
                    join orders o on c.id = o.client_id
                    join status_orders so on o.id = so.order_id
                    join process_orders po on so.process_order_id = po.id
                where a.title = '$article'
                and po.id = 4
                group by raiting
                order by ra.raiting desc;
            "
        );

        $comentarios = DB::select(
            "
                select a.title as articulo, ra.raiting as raiting ,concat_ws(' ' ,c.last_name,c.mother_last_name,c.first_name,c.second_name) as cliente , ca.comment as  comentario , ca.created_at as fecha
                from clients c join raiting_articles ra on c.id = ra.client_id
                    join commentary_articles ca on c.id = ca.client_id
                    join articles a on ra.article_id = a.id
                    join order_details od on a.id = od.article_id
                    join orders o on c.id = o.client_id
                    join status_orders so on o.id = so.order_id
                    join process_orders po on so.process_order_id = po.id
                and a.title = '$article'
                where ra.raiting = $raiting
                and po.id = 4
                group by articulo ,cliente, comentario ,  fecha
                order by fecha desc;
            "
        );

        return view('articles.comentariosDeLosClientesPorRaiting',compact('comentarios','articles','raitings'));
    }
}
