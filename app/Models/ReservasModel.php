<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservasModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'reservas';

    protected $fillable = [
        'nombre',
        'fecha',
        'hora',
        'personas',
        'telefono',
        'email',
        'estado',
    ];

    protected $casts = [
        'fecha'    => 'date',
        'hora'     => 'datetime:H:i',
        'personas' => 'integer',
    ];
}
