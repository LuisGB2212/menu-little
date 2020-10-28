<?php

namespace App;

use App\CategoryType;
use App\DrinkFood;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $with = ['drinkFoods'];
    
    protected $fillable = [
        'id',
        'category_name',
        'position',
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
