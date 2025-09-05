<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Una Llamada Una Vida - Lista de Consultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header {
            background-color: #0d6efd;
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
        }
        .card-header {
            background-color: #f8f9fa;
            font-weight: bold;
        }
        .btn-add {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <div class="container">
            <h1>Una Llamada Una Vida</h1>
            <p class="lead">Lista de Consultas Médicas</p>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Consultas Registradas</h2>
            <div>
                <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-arrow-counterclockwise"></i> Actualizar
                </a>
                <a href="{{ route('consultations.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Nueva Consulta
                </a>
            </div>
        </div>

        @if($consultations->count() > 0)
            @foreach($consultations as $consultation)
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ $consultation->name }}</span>
                        <div>
                            <a href="{{ route('consultations.download', $consultation) }}" class="btn btn-sm btn-outline-primary me-2">
                                <i class="bi bi-download"></i> PDF
                            </a>
                            <small class="text-muted">{{ $consultation->created_at->format('d/m/Y H:i') }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Cédula:</strong> {{ $consultation->id_number }}</p>
                                <p><strong>Teléfono:</strong> {{ $consultation->phone }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Dirección:</strong> {{ $consultation->address }}</p>
                                <p><strong>Fecha de Consulta:</strong> {{ \Carbon\Carbon::parse($consultation->consultation_date)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="mt-3">
                            <p class="mb-1"><strong>Descripción:</strong></p>
                            <p class="text-muted">{{ $consultation->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-center mt-4">
                {{ $consultations->links() }}
            </div>
        @else
            <div class="alert alert-info">
                No hay consultas registradas. 
                <a href="{{ route('consultations.create') }}" class="alert-link">Crear una nueva consulta</a>.
            </div>
        @endif
    </div>

    <footer class="text-center mt-5 mb-3">
        <p>© {{ date('Y') }} Una Llamada Una Vida - Todos los derechos reservados</p>
        <p class="text-muted">
            <i class="bi bi-geo-alt"></i> Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04, Urb. Prebo, Valencia, Carabobo Zona Postal 2001 - Venezuela
            <br>
            <i class="bi bi-telephone"></i> 0414-4265181
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
