<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre_producto', 'descripcion_producto', 'precio', 'categoria_id'];

    // Relación con el modelo Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con el modelo Oferta
    public function oferta()
    {
        return $this->hasOne(Oferta::class);
    }
}