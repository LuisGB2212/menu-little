<?php

namespace App\Http\Controllers\frontend;

use App\DrinkFood;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DrinkFoodController extends Controller
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
     * @param  \App\DrinkFood  $drinkFood
     * @return \Illuminate\Http\Response
     */
    public function show(DrinkFood $drinkFood)
    {
        return response()->json([
            'data' => $drinkFood
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrinkFood  $drinkFood
     * @return \Illuminate\Http\Response
     */
    public function edit(DrinkFood $drinkFood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrinkFood  $drinkFood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkFood $drinkFood)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrinkFood  $drinkFood
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrinkFood $drinkFood)
    {
        //
    }
}
