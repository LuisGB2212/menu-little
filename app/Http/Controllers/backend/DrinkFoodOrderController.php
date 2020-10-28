<?php

namespace App\Http\Controllers\backend;

use App\DrinkFoodOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrinkFoodOrderController extends Controller
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
     * @param  \App\DrinkFoodOrder  $drinkFoodOrder
     * @return \Illuminate\Http\Response
     */
    public function show(DrinkFoodOrder $drinkFoodOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrinkFoodOrder  $drinkFoodOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(DrinkFoodOrder $drinkFoodOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrinkFoodOrder  $drinkFoodOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkFoodOrder $drinkFoodOrder)
    {
        $drinkFoodOrder->status = 'servido';
        $drinkFoodOrder->save();

        return response()->json([
            'drinkFood' => $drinkFoodOrder,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrinkFoodOrder  $drinkFoodOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrinkFoodOrder $drinkFoodOrder)
    {
        //
    }
}
