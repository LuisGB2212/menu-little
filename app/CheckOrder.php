<?php

namespace App;

use App\OrderUser;
use Illuminate\Database\Eloquent\Model;

class CheckOrder extends Model
{
    protected $fillable = [
        'id',
        'payment_method',
        'transaction_status',
        'payment_id',
        'order_id'
    ];

    public function orderUser()
    {
        return $this->belongsTo(OrderUser::class);
    }

}
