<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizer;
use App\Models\Venue;
use App\Models\Asistente;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
            OrganizerSeeder::class,
            VenueSeeder::class,
            AsistenteSeeder::class,
            EventSeeder::class,
        ]);
        $organizer1 = Organizer::create([
            'nombre' => 'Tech Meetup España',
            'correo' => 'tech@meetup.es',
        ]);
        $organizer2 = Organizer::create([
            'nombre' => 'Cultura Vibe S.L.',
            'correo' => 'cultura@vibe.com',
        ]);

        $venue1 = Venue::create([
            'nombre' => 'Sala Central Auditorio',
            'direccion' => 'Calle Principal 10, Madrid',
            'capacidad' => 300,
        ]);
        $venue2 = Venue::create([
            'nombre' => 'Espacio Coworking BCN',
            'direccion' => 'Avenida Diagonal 25, Barcelona',
            'capacidad' => 80,
        ]);

        $asistente1 = Asistente::create(['nombre' => 'Ana García', 'correo' => 'ana.g@mail.com']);
        $asistente2 = Asistente::create(['nombre' => 'Luis Pérez', 'correo' => 'luis.p@mail.com']);
        $asistente3 = Asistente::create(['nombre' => 'Marta Ruíz', 'correo' => 'marta.r@mail.com']);

        $event1 = Event::create([
            'organizer_id' => $organizer1->id,
            'venue_id' => $venue1->id,
            'titulo' => 'Conferencia Laravel 2025',
            'descripcion' => 'El evento anual sobre el framework PHP Laravel.',
            'fecha' => '2025-10-20 18:00:00',
        ]);

        $event2 = Event::create([
            'organizer_id' => $organizer2->id,
            'venue_id' => $venue2->id,
            'titulo' => 'Taller de Fotografía Urbana',
            'descripcion' => 'Aprende a capturar la esencia de la ciudad.',
            'fecha' => '2025-12-05 10:30:00',
        ]);
        
        
        $event1->asistentes()->attach([$asistente1->id, $asistente2->id, $asistente3->id]);
        
        $event2->asistentes()->attach([$asistente1->id, $asistente3->id]);
    }
}
