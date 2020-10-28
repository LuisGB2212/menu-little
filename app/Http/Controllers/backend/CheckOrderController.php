<?php

namespace App\Http\Controllers\backend;

use App\Order;
use App\CheckOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckOrderController extends Controller
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
        $request->validate([
            'order_id' => 'required',
            'montPay' => 'required',
        ]);

        $order = Order::findOrFail($request->order_id);
        $total = $order->total();
        $cambio = 0;
        $message = 'error';

        if($total <= $request->montPay){
            $message = 'success';
            $checkOrder = CheckOrder::create([
                'payment_method' => 'efectivo',
                'transaction_status' => 'Aprobado',
                'payment_id' => 'not_include',
                'order_id' => $order->id
            ]);
            $cambio = $request->montPay - $total;
        }

        return response()->json([
            'message' => $message,
            'order' => $order,
            'change' => number_format($cambio,2,'.',',')
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CheckOrder  $checkOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CheckOrder $checkOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CheckOrder  $checkOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckOrder $checkOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CheckOrder  $checkOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CheckOrder $checkOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CheckOrder  $checkOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckOrder $checkOrder)
    {
        //
    }
}
