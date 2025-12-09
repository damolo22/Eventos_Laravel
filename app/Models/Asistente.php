<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 

class Asistente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo','event_id'];

public function event()
    {
    // Un Asistente pertenece a un Evento
    return $this->belongsTo(Event::class);
    }
}