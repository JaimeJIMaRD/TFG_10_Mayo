<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otro_Actor extends Model
{
    use HasFactory;
    protected $table = 'otro_actor';

    protected $fillable = [
        'nombre_actor',
        'contexto',
        'id_actor',
        'id_personaje',
    ];

    public function personajes()
    {
        return $this->BelongsTo(Personaje::class);
    }
}
