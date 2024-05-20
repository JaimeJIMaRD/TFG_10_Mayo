<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gusta extends Model
{
    use HasFactory;
    protected $table = 'Gusta';

    protected $fillable = [
        'user_id',
        'elenco_id',
    ];

    public function elencos()
    {
        return $this->BelongsTo(Elenco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }


}
