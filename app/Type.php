<?php

namespace App;

use App\CategoryType;
use App\DrinkFood;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'id',
        'type_name'
    ];

    public function drinkFoods()
    {
        return $this->hasMany(DrinkFood::class);
    }

    public function categoryTypes()
    {
        return $this->hasMany(CategoryType::class);
    }

}
