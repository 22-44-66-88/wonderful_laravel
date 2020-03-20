<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    public function cantidadDeProductosPorCliente_2( Request $request, Client $clients)
    {
        $request->user()->authorizeRole(['adminstrador']);

        $clients = DB::select(
            "select concat_ws(' ',c.last_name,c.mother_last_name,c.first_name,c.second_name) as cliente,
                 count(do.id) as cantidadProducto, year(o.created_at) as anio
            from categories d join sub_categories sd on d.id = sd.category_id
                 join articles a on sd.id = a.sub_category_id
                 join order_details do on a.id = do.article_id
                 join orders o on do.order_id = o.id
                 join status_orders eo on o.id = eo.order_id
                 join process_orders po on eo.process_order_id = po.id
                 join price_articles pa on a.id = pa.article_id
                 join clients c on o.client_id = c.id
            -- where eo.id = 4
            and year(o.created_at) = 2015
            group by o.id
            order by cantidadProducto desc;"
        );
//        dd($clients);
        return view('clients.cantidadDeProductosPorCliente_2',compact('clients'));
    }
}
