<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'user_id', 'category_id', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Un restaurante pertenece a un usuario
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Un restaurante pertenece a una categoría
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Un restaurante tiene muchas reseñas
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    // Un restaurante puede tener muchas fotos
    public function photos() {
        return $this->morphMany(Photo::class, 'imageable');
    }

    // Usuarios pueden marcar restaurantes como favoritos (tabla pivote)
    public function favoritedBy() {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // Scope: solo restaurantes activos
    public function scopeActive($query) {
        return $query->where('status', 'active');
    }

    // Accessor: capitaliza nombre
    public function getNameAttribute($value) {
        return ucwords($value);
    }
}
