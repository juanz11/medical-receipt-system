<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Una Llamada Una Vida - Consulta Médica</title>
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
        .form-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 2rem;
        }
        .contact-info {
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Una Llamada Una Vida</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            <i class="bi bi-list-ul"></i> Lista de Consultas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('consultations.create') }}">
                            <i class="bi bi-plus-circle"></i> Nueva Consulta
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header text-center">
        <h1>Registro de Consulta Médica</h1>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-container">
                    <form method="POST" action="{{ route('consultations.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="id_number" class="form-label">Cédula</label>
                                <input type="text" class="form-control" id="id_number" name="id_number" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Lugar de Residencia</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label for="consultation_date" class="form-label">Fecha de Consulta</label>
                            <input type="date" class="form-control" id="consultation_date" name="consultation_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="seen_by" class="form-label">¿Con quién se vio?</label>
                                <input type="text" class="form-control" id="seen_by" name="seen_by" placeholder="Nombre del médico o profesional">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="visit_type" class="form-label">Tipo de Visita</label>
                                <select class="form-select" id="visit_type" name="visit_type">
                                    <option value="">Seleccione...</option>
                                    <option value="Una Llamada una Vida"> Una Llamada una Vida < /option>
                                    <option value="Fundación">Fundación</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción de la Consulta</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Guardar Consulta</button>
                        </div>
                    </form>
                </div>

                <div class="contact-info mt-4">
                    <h5>Información de Contacto</h5>
                    <p><strong>Dirección:</strong> Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04, Urb. Prebo, Valencia, Carabobo Zona Postal 2001 - Venezuela</p>
                    <p><strong>Teléfono de Atención:</strong> 0414-4265181</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3">
        <p>© {{ date('Y') }} Una Llamada Una Vida - Todos los derechos reservados</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
