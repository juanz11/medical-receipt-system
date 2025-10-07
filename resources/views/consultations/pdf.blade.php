<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Consulta Médica - Una Llamada Una Vida</title>
    <style>
        @page {
            margin: 1cm;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            line-height: 1.3;
            color: #2c3e50;
            position: relative;
            padding: 10px;
            font-size: 11px;
        }
        
        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 400px;
            height: 400px;
            margin-left: -200px;
            margin-top: -200px;
            opacity: 0.08;
            z-index: -1;
        }
        
        .container {
            max-width: 100%;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            padding: 15px;
            border-radius: 5px;
        }
        
        .header-logo {
            text-align: center;
            margin-bottom: 10px;
            padding-bottom: 8px;
            border-bottom: 2px solid #0d6efd;
        }
        
        .header-logo h1 {
            color: #0d6efd;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .header-logo .contact-info {
            font-size: 8px;
            color: #555;
            line-height: 1.2;
            margin-top: 3px;
        }
        
        .header-logo .contact-info p {
            margin: 1px 0;
        }
        
        .document-title {
            text-align: center;
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 8px;
            margin: 8px 0;
            border-radius: 3px;
        }
        
        .document-title h2 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 2px;
            letter-spacing: 1px;
        }
        
        .document-title .emission-date {
            font-size: 9px;
            opacity: 0.9;
        }
        
        .section {
            margin: 10px 0;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 4px;
            border-left: 3px solid #0d6efd;
        }
        
        .section-title {
            color: #0d6efd;
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding-bottom: 4px;
            border-bottom: 1px solid #dee2e6;
        }
        
        .info-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }
        
        .info-row {
            display: table-row;
            border-bottom: 1px solid #e9ecef;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .info-label {
            display: table-cell;
            font-weight: bold;
            color: #495057;
            padding: 4px 10px 4px 0;
            width: 140px;
            vertical-align: top;
            font-size: 10px;
        }
        
        .info-value {
            display: table-cell;
            color: #212529;
            padding: 4px 0;
            vertical-align: top;
            font-size: 10px;
        }
        
        .consultation-details {
            margin: 10px 0;
        }
        
        .details-box {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 10px;
            min-height: 100px;
            line-height: 1.4;
            color: #495057;
            font-size: 10px;
        }
        
        .footer {
            margin-top: 15px;
            padding-top: 8px;
            border-top: 1px solid #dee2e6;
            text-align: center;
            font-size: 7px;
            color: #6c757d;
        }
        
        .footer p {
            margin: 2px 0;
        }
        
        .divider {
            height: 1px;
            background: linear-gradient(to right, transparent, #0d6efd, transparent);
            margin: 8px 0;
        }
    </style>
</head>
<body>
    <img src="{{ public_path('logo-david-04-002-scaled.webp') }}" class="watermark" alt="">
    <div class="container">
        <div class="header-logo">
            <h1>UNA LLAMADA UNA VIDA</h1>
            <div class="contact-info">
                <p>Av. Andrés Eloy Blanco, Edificio Centro Profesional Prebo, Piso 2, Of. 2-04</p>
                <p>Urb. Prebo, Valencia, Carabobo Zona Postal 2001 - Venezuela</p>
                <p>Teléfono: 0414-4265181</p>
            </div>
        </div>

        <div class="document-title">
            <h2>CONSULTA MÉDICA</h2>
            <p class="emission-date">Fecha de emisión: {{ now()->format('d/m/Y') }}</p>
        </div>
        
        <div class="divider"></div>

        <div class="section">
            <div class="section-title">Información del Paciente</div>
            <div class="info-grid">
                <div class="info-row">
                    <div class="info-label">Nombre:</div>
                    <div class="info-value">{{ $consultation->name }}</div>
                </div>
                @if($consultation->age)
                <div class="info-row">
                    <div class="info-label">Edad:</div>
                    <div class="info-value">{{ $consultation->age }} años</div>
                </div>
                @endif
                @if($consultation->gender)
                <div class="info-row">
                    <div class="info-label">Sexo:</div>
                    <div class="info-value">{{ $consultation->gender }}</div>
                </div>
                @endif
                <div class="info-row">
                    <div class="info-label">Cédula:</div>
                    <div class="info-value">{{ $consultation->id_number }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Teléfono:</div>
                    <div class="info-value">{{ $consultation->phone }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Dirección:</div>
                    <div class="info-value">{{ $consultation->address }}</div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fecha de Consulta:</div>
                    <div class="info-value">{{ \Carbon\Carbon::parse($consultation->consultation_date)->format('d/m/Y') }}</div>
                </div>
                @if($consultation->seen_by)
                <div class="info-row">
                    <div class="info-label">Atendido por:</div>
                    <div class="info-value">{{ $consultation->seen_by }}</div>
                </div>
                @endif
                @if($consultation->visit_type)
                <div class="info-row">
                    <div class="info-label">Tipo de Visita:</div>
                    <div class="info-value">{{ $consultation->visit_type }}</div>
                </div>
                @endif
            </div>
        </div>

        <div class="section consultation-details">
            <div class="section-title">Detalles de la Consulta</div>
            <div class="details-box">
                {!! nl2br(e($consultation->description)) !!}
            </div>
        </div>

        <div class="footer">
            <p><strong>© {{ date('Y') }} Una Llamada Una Vida</strong> - Todos los derechos reservados</p>
            <p>Documento generado el {{ now()->format('d/m/Y H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
