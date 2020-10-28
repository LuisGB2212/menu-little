<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TypeUser extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
