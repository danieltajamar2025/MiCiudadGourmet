<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['url', 'imageable_id', 'imageable_type'];

    // Relación polimórfica
    public function imageable() {
        return $this->morphTo();
    }
}
