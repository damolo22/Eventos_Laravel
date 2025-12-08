<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; 

class Asistente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo'];

    /**
     * Un participante asiste a muchos eventos (Relación N:M)
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}