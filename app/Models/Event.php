<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['organizer_id', 'venue_id', 'titulo', 'descripcion', 'fecha'];
    
    protected $casts = [
        'fecha' => 'datetime',
    ];

    /**
     * Un evento pertenece a un organizador (Relación N:1)
     */
    public function organizer(): BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }

    /**
     * Un evento se realiza en una ubicación (Relación N:1)
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }

    /**
     * Un evento tiene muchos asistentes (Relación 1:N)
     */
    public function asistentes() 
    {
        return $this->hasMany(Asistente::class); 
    }
}