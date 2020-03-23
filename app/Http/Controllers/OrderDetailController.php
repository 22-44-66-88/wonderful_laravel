<?php

namespace App\Http\Controllers;

use App\Client;
use App\OrderDetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
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
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }

    public function detalleDeOrdenesPorCliente(Request $request, Client $clients){
        if ($request->user()->authorizeRole(['administrador'])) {
//            $users =  DB::table('users')->select('*')->get();
            $clients = DB::select("
                select c.id as id, concat_ws(' ',c.last_name,c.mother_last_name,c.first_name,c.second_name) as cliente,
                       c.ci as ci ,
                       CASE c.active
                          when 1 then 'activo'
                          when 0 then 'inactivo'
                       END as activo
                from clients c;"
            );
//            dd($users);
            return view('clients.detalleDeOrdenesPorCliente',compact('clients'));
        } else {
            abort(403, 'you do not authorized for this web site');
        }
    }
}
