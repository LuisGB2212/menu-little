<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'payment_method',
        'transactio_status',
        'payment_id',
        'order_user_id'
    ];

    public function orderUser()
    {
        return $this->belongsTo(OrderUser::class);
    }
    
}
