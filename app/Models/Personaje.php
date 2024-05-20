<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personaje extends Model
{
    use HasFactory;

    protected $table = 'personaje';

    protected $fillable = [
        'nombre',
        'serie',
        'muestra',
        'imagen_logo',
        'imagen_fondo',
        'actor_id',
    ];

    public function actores()
    {
        return $this->BelongsTo(Actor::class);
    }

    public function otros_actores()
    {
        return $this->hasMany(Otro_Actor::class);
    }
}
