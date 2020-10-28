<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class TypeOrder extends Model
{
    protected $fillable = [
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
