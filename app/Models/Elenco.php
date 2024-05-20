<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elenco extends Model
{
    use HasFactory;
    protected $table = 'Elenco';

    protected $fillable = [
        'descripcion',
        'titulo',
        'imagen_id',
        'user_id',
    ];

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function gustas()
    {
        return $this->hasMany(Gusta::class);
    }

    public function papeles()
    {
        return $this->hasMany(Papel::class);
    }
}
