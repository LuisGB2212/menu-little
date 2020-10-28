<?php

namespace App;

use App\Category;
use App\Type;
use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $with = ['category'];

    protected $fillable = [
        'id',
        'category_id',
        'type_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
