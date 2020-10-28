<?php

namespace App;

use App\Type;
use App\Order;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class DrinkFood extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'type_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
