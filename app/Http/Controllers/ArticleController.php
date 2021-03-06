<?php

namespace App\Http\Controllers;

use App\Article;
use App\Charts\BarChart;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->authorizeRole(['administrador'])) {
            
            $sub_categories = SubCategory::all();

            $articles = DB::select(
                "select a.id as id , a.title as article , a.marker as marker , a.stock  as stock,
                        sb.sub_category as sub_category , c.category as category
                 from  articles a inner join sub_categories sb on a.sub_category_id  = sb.id 
                 inner join categories c on sb.category_id  = c.id;
            ");
            //        dd($articles);
            return view('articles.crud.index', compact('articles','sub_categories'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
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
        // $articles = request()->all();
            
        // return response()->json($articles);
        
        // $articles = request()->except('_token');
         
        
        $request->validate([
            'sub_category_id' => 'required',
            'title' => 'required',
            'marker' => 'required',
            'description' => 'required',
            'stock' => 'required',
            ]);
            
            Article::create($request->all());
            
            // return response()->json($request); 
            return redirect()->route('articles.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
    public function articulosVendidosPorMes( Request $request, Article $articles)
    {
        if ($request->user()->authorizeRole(['administrador'])) {
            $articles = DB::select(
                "select a.title as producto , dt.quantity as cantidad,
                            CASE MONTH(o.created_at)
                                when 1 then 'Enero'
                                when 2 then 'Febrero'
                                when 3 then 'Marzo'
                                when 4 then 'Abril'
                                when 5 then 'Mayo'
                                when 6 then 'Junio'
                                when 7 then 'Julio'
                                when 8 then 'Agosto'
                                when 9 then 'Septiembre'
                                when 10 then 'Octubre'
                                when 11 then 'Noviembre'
                                when 12 then 'Diciembre'
                            END as mes
                        from order_details dt
                            inner join articles a on a.id = dt.article_id
                            inner join orders o on o.id = dt.order_id
                            inner join price_articles pa on pa.id = dt.price_article_id
                            inner join clients c on c.id = o.client_id
                            inner join status_orders so on so.order_id = o.id
                            inner join process_orders po on so.process_order_id = po.id
                        where po.id = 4
                        -- and MONTH(o.created_at) = 4
                        group by a.title , dt.quantity , mes
                        order by cantidad desc;"
            );
            //        dd($articles);
            return view('articles.articulosVendidosPorMes', compact('articles'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
    }

    public function promedioDeProductosMasVendidosPorCiudades($city_id, Article $articles , Request $request){

        if ($request->user()->authorizeRole(['administrador'])) {

            $cities = DB::table('cities')->select('*')->paginate(3);
            //        dd($cities);
            $articles = DB::select(
                "
                    select c.city as ciudad ,  a.title as producto , count(od.article_id) as cantidad , avg(od.sub_total) as totalVenta
                    from articles a join order_details od on a.id = od.article_id
                         join orders o on od.order_id = o.id
                         join transport_fares tf on o.transport_fares_id = tf.id
                         join cities c on tf.city_id = c.id
                         join status_orders so on o.id = so.order_id
                         join process_orders po on so.process_order_id = po.id
                    where po.id = 5
                    and c.id = $city_id
                    group by ciudad,producto
                    order by totalVenta desc;

                "
            );

            $barchart = new BarChart();

            foreach ($articles as $article) {
                $barchart->dataset(
                    $article->producto, 'bar', [$article->totalVenta]
                );
            }
            //        dd($articles);
            // return view('articles.promedioDeProductosMasVendidosPorCiudades',compact('barchart','articles','cities'));
            return view('articles.promedioDeProductosMasVendidosPorCiudades', compact('barchart', 'articles', 'cities'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
    }
}

