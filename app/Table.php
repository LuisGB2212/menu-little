<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable = [
        'id',
        'number',
        'name'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
