<?php

namespace App;

use App\DrinkFood;
use Illuminate\Database\Eloquent\Model;

class DrinkFoodOrder extends Model
{
    protected $fillable = [
        'id',
        'drink_food_id',
        'order_id',
        'price',
        'quantity',
        'diner_number',
        'status',
        'details'
    ];

    public function drinkFood()
    {
        return $this->belongsTo(DrinkFood::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function total()
    {
        return number_format($this->quantity * $this->price,'2','.',',');
    }
}
