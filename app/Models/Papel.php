<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    use HasFactory;
    protected $table = 'Papel';

    protected $fillable = [
        'foto_id',
        'muestra',
        'nombre',
        'nombre_actor',
        'actor_id',
        'elenco_id',
    ];

    public function elencos()
    {
        return $this->BelongsTo(Elenco::class);
    }

    public function actores()
    {
        return $this->hasOne(Actor::class);
    }
}
