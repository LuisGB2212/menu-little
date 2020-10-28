<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Order;
use App\DrinkFoodOrder;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PendingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::where('table_id','!=',null)->whereHas('drinkFoodOrders', function($query){
        //     $query->where('status','pendiente')->get();
        // })->doesntHave('checkOrders')->orderBy('created_at','asc')->get();
        $orders = Order::where('status','abierto')
            ->where('table_id','!=',null)
            ->whereHas('drinkFoodOrders', function (Builder $query) {
                $query->orWhere('status', 'pendiente');
            })
            ->get();

        $deliveries = Order::where('status','abierto')
            ->where('table_id',null)
            ->whereHas('drinkFoodOrders', function (Builder $query) {
                $query->orWhere('status', 'pendiente');
            })
            ->get();

        //return $order;
        return view('backend.pending_orders',compact('orders','deliveries'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $drinkFoods = $order->drinkFoodOrders;
        return response()->json([
            'data' => view('backend.partitials.informationOrderFood',compact('drinkFoods'))->render()
        ]);
        return $order->drinkFoodOrders;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $message = 'noPay';
        if($order->checkOrders->count() > 0){
            $order->status = 'cerrado';
            $order->save();
            $message = 'success';
        }
        

        return response()->json([
            'order' => $order,
            'message' => $message
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
