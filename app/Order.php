<?php

namespace App;

use App\DrinkFoodOrder;
use App\CheckOrder;
use App\Table;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number_order',
        'status',
        'table_id',
        'waiter_id',
        'diner_id',
        'type_order_id'
    ];

    public function checkOrders()
    {
        return $this->hasMany(CheckOrder::class);
    }

    public function drinkFoodOrders()
    {
        return $this->hasMany(DrinkFoodOrder::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }

    public function diner()
    {
        return $this->belongsTo(User::class, 'diner_id');
    }

    public function typeOrder()
    {
        return $this->belongsTo(TypeOrder::class);
    }

    public function total()
    {
        $total = 0;
        foreach ($this->drinkFoodOrders as $key => $drinkFood) {
            $total += $drinkFood->total();
        }
        return number_format($total,2,'.',',');
    }
}
