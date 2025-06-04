<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{
    protected $fillable = [
        'alta_id', 'nombre_equipo', 'serial', 'modelo', 'reutilizado', 'fecha_entrega'
    ];

    public function alta()
    {
        return $this->belongsTo(Alta::class);
    }
}
