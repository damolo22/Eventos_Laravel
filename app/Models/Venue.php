<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class Venue extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'direccion', 'capacidad'];

    /**
     * Una ubicación tiene muchos eventos (Relación 1:N)
     */
    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}