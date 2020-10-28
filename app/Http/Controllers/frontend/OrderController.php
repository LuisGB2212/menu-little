<?php

namespace App\Http\Controllers\frontend;

use App\User;
use App\Order;
use App\DrinkFoodOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
        //return $request->all();
        $tableId = null;
        $dinerId = null;
        $message = 'success';
        if($request->session()->has('table')){
            $tableId = $request->session()->get('table');
        }
        
        if(isset($request->name) && !$request->session()->has('client')){
             
            $checkUser = User::where('email', $request->email)->first();
            if($checkUser === null){
                $user = User::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'references' => $request->references,
                    'email' => $request->email,
                ]);
            }else{
                $user = $checkUser;
            }
            
            $dinerId = $user->id;
            $request->session()->put('client', $user);
        }
        
        if(!$request->session()->has('order')){
            $order = Order::where('table_id',$tableId)->doesntHave('checkOrders')->first();
            if($order === null){
                $order = Order::create([
                    'number_order' => 'ord-00-'.date('Y'),
                    'table_id' => $tableId,
                    'diner_id' => $dinerId,
                    'type_order_id' => $request->typeOrderId,
                ]);
            }
            
            $request->session()->put('order', $order);
        }else{
            $order = $request->session()->get('order');
        }
        //return $order;
        foreach (Cart::content() as $key => $item) {
            $drinkFoodOrder = DrinkFoodOrder::create([
                'drink_food_id' => $item->id,
                'order_id' => $order['id'],
                'price' => $item->price,
                'quantity' => $item->qty,
                'details' => $item->options->details
            ]);
        }
        
        Cart::destroy();
        $order->number_order = 'ord-00'.$order->id.'-'.date('Y');
        $order->save();
        return response()->json([
            'message' => $message,
            'data' => $order,
            'totalProduct' => Cart::count(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
