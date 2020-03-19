<?php

namespace App\Http\Controllers;

use App\Article;
use App\City;
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
        $request->user()->authorizeRole(['adminstrador']);


        $articles = DB::table('articles')->select('*')->paginate(5);

        $raitings = DB::select(
            "
                -- select a.title as article , concat_ws(' ',c.last_name,c.mother_last_name,c.second_name,c.first_name) as cliente , ra.raiting as raiting , ca.comment as comentario
                
                select ra.raiting as raiting , count(c.id) as cantidadCliente
                from articles a join raiting_articles ra on a.id = ra.article_id
                     join clients c on ra.client_id = c.id
                     join commentary_articles ca on a.id = ca.article_id
                where a.id = 1
                group by raiting
                order by ra.raiting desc
                ;
            "
        );

        return view('articles.raitingsYComentariosArticulos',compact('raitings','articles'));
    }

    public function raitingsYComentarios($article_id , Article $articles ,Request $request){
        $request->user()->authorizeRole(['adminstrador']);

        $articles = DB::table('articles')->select('*')->paginate(5);

        $raitings = DB::select(
            "
                select a.title as article , concat_ws(' ',c.last_name,c.mother_last_name,c.second_name,c.first_name) as cliente , ra.raiting as raiting , ca.comment as comentario
                from articles a join raiting_articles ra on a.id = ra.article_id
                     join clients c on ra.client_id = c.id
                     join commentary_articles ca on a.id = ca.article_id
                where a.id = $article_id
                order by ra.raiting desc
                ;
            "
        );

        return view('articles.raitingsYComentarios',compact('raitings','articles'));
    }
}
