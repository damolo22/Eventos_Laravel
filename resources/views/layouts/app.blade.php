<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestor de Eventos - Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <style>
        .bg-success {z
            background-color: #28a745 !important; 
        }
    </style>

</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Gestor de Eventos 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organizadores.index') }}">
                            <i class="fas fa-user-tie me-1"></i> Organizadores
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">
                            <i class="fas fa-calendar-alt me-1"></i> Eventos
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('venues.index') }}">
                            <i class="fas fa-map-marker-alt me-1"></i> Sedes (Venues)
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('asistentes.index') }}">
                            <i class="fas fa-users me-1"></i> Asistentes
                        </a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>