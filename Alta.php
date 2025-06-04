<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alta;


class Alta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'departamento',
        'fecha_entrada',
        'estado',
        'jefe_id',
    ];

    protected $casts = [
        'fecha_entrada' => 'datetime',
    ];

    public function jefe()
    {
        return $this->belongsTo(User::class, 'jefe_id');
    }

    public function equipo()
    {
        return $this->hasOne(Equipo::class);
    }
}
