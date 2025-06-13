<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Pivot
{
    protected $table = 'favorites';
    protected $fillable = ['user_id', 'restaurant_id'];
}
