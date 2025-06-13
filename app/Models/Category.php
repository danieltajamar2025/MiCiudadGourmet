<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    // Una categoría tiene muchos restaurantes
    public function restaurants() {
        return $this->hasMany(Restaurant::class);
    }
}
