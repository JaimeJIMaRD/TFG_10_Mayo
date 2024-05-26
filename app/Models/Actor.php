<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    protected $table = 'Actor';

    protected $fillable = [
        'nombre',
        'apellido',
        'estado',
        'actores_recurrentes',
        'foto_id',
        'eldoblaje',
        'twitter',
        'ciudad',
        'instagram',
        'cumpleanos',
    ];

    public function papeles()
    {
        return $this->belongsToMany(Papel::class);
    }

    public function personajes()
    {
        return $this->hasMany(Personaje::class);
    }

}
