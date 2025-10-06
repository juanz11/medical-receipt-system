<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimiendo Consulta...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .container-sm { max-width: 860px; }
        iframe { width: 100%; height: 80vh; border: 1px solid #e9ecef; background: white; }
    </style>
</head>
<body>
    <div class="container-sm py-4">
        @if(session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div class="mb-3">
            <h1 class="h4 text-primary mb-1">Generando documento</h1>
            <p class="text-muted mb-0">El documento PDF de la consulta se abrirá para imprimir y luego volverás al inicio.</p>
        </div>

        <iframe id="pdfFrame" src="{{ route('consultations.pdf', $consultation) }}" title="Consulta PDF"></iframe>

        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Volver al inicio</a>
            <a href="{{ route('consultations.download', $consultation) }}" class="btn btn-outline-primary">Descargar PDF</a>
        </div>
    </div>

    <script>
        (function() {
            const iframe = document.getElementById('pdfFrame');

            function redirectHome() {
                window.location.href = "{{ route('home') }}";
            }

            function tryPrint() {
                try {
                    if (iframe && iframe.contentWindow) {
                        iframe.contentWindow.focus();
                        iframe.contentWindow.print();
                    }
                } catch (e) {
                    // Ignore cross-origin issues (shouldn't happen for same-origin PDF stream)
                } finally {
                    // Fallback: ensure we return home even if print dialog doesn't fire events
                    setTimeout(redirectHome, 2000);
                }
            }

            // When iframe loads the PDF, trigger print
            iframe.addEventListener('load', function() {
                // Some browsers need a small delay for the PDF viewer to initialize
                setTimeout(tryPrint, 400);
            });

            // Also try to detect when printing finishes, then redirect sooner
            if (window.matchMedia) {
                const mediaQueryList = window.matchMedia('print');
                mediaQueryList.addEventListener ?
                    mediaQueryList.addEventListener('change', (mql) => { if (!mql.matches) redirectHome(); }) :
                    mediaQueryList.addListener((mql) => { if (!mql.matches) redirectHome(); });
            }

            // Safari/iOS fallback: redirect after a longer timeout just in case
            setTimeout(redirectHome, 5000);
        })();
    </script>
</body>
</html>
