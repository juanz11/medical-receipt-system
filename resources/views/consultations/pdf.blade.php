<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Consulta Médica - Una Llamada Una Vida</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            position: relative;
        }
        body::before {
            content: "";
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 400px;
            background-image: url('{{ public_path('logo-david-04-002-scaled.webp') }}');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            opacity: 0.08;
            z-index: -1;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #0d6efd;
            margin: 0;
        }
        .header p {
            margin: 5px 0 0;
            color: #666;
        }
        .patient-info {
            margin-bottom: 20px;
        }
        .patient-info h2 {
            background-color: #f8f9fa;
            padding: 8px;
            font-size: 16px;
            border-left: 4px solid #0d6efd;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .info-label {
            font-weight: bold;
            width: 150px;
        }
        .consultation-details {
            margin-top: 20px;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo h1 {
            color: #0d6efd;
            font-size: 24px;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="logo">
        <h1>UNA LLAMADA UNA VIDA</h1>
        <p>Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04</p>
        <p>Urb. Prebo, Valencia, Carabobo Zona Postal 2001 - Venezuela</p>
        <p>Teléfono: 0414-4265181</p>
    </div>

    <div class="header">
        <h2>CONSULTA MÉDICA</h2>
        <p>Fecha de emisión: {{ now()->format('d/m/Y') }}</p>
    </div>

    <div class="patient-info">
        <h2>INFORMACIÓN DEL PACIENTE</h2>
        <div class="info-row">
            <div class="info-label">Nombre:</div>
            <div>{{ $consultation->name }}</div>
        </div>
        @if($consultation->age)
        <div class="info-row">
            <div class="info-label">Edad:</div>
            <div>{{ $consultation->age }} años</div>
        </div>
        @endif
        @if($consultation->gender)
        <div class="info-row">
            <div class="info-label">Sexo:</div>
            <div>{{ $consultation->gender }}</div>
        </div>
        @endif
        <div class="info-row">
            <div class="info-label">Cédula:</div>
            <div>{{ $consultation->id_number }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Teléfono:</div>
            <div>{{ $consultation->phone }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Dirección:</div>
            <div>{{ $consultation->address }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Fecha de Consulta:</div>
            <div>{{ \Carbon\Carbon::parse($consultation->consultation_date)->format('d/m/Y') }}</div>
        </div>
        @if($consultation->seen_by)
        <div class="info-row">
            <div class="info-label">Atendido por:</div>
            <div>{{ $consultation->seen_by }}</div>
        </div>
        @endif
        @if($consultation->visit_type)
        <div class="info-row">
            <div class="info-label">Tipo de Visita:</div>
            <div>{{ $consultation->visit_type }}</div>
        </div>
        @endif
    </div>

    <div class="consultation-details">
        <h2>DETALLES DE LA CONSULTA</h2>
        <div style="border: 1px solid #eee; padding: 15px; min-height: 150px;">
            {!! nl2br(e($consultation->description)) !!}
        </div>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} Una Llamada Una Vida - Todos los derechos reservados</p>
        <p>Documento generado el {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
