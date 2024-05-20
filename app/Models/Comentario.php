<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Comentario extends Model
{
    use HasFactory;
    protected $table = 'Comentario';


    protected $fillable = [
        'contenido',
        'fecha',
        'elenco_id',
        'user_id',
    ];
    public function elencos()
    {
        return $this->belongsTo(Elenco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
