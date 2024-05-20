<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file_path'];

    public function elenco()
    {
        return $this->belongsTo(Elenco::class);
    }

    public function actor()
    {
        return $this->belongsTo(Actor::class);
    }

    public function personaje()
    {
        return $this->belongsTo(Personaje::class);
    }

    public function papel()
    {
        return $this->belongsTo(Papel::class);
    }
}

