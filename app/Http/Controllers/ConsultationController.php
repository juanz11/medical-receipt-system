<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = Consultation::latest()->paginate(10);
        return view('consultations.index', compact('consultations'));
    }
    public function create()
    {
        return view('consultations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'consultation_date' => 'required|date',
            'description' => 'required|string',
        ]);

        // Ensure the date is properly formatted
        $validated['consultation_date'] = \Carbon\Carbon::parse($validated['consultation_date']);

        $consultation = Consultation::create($validated);

        return redirect()->route('consultations.download', $consultation)
                         ->with('success', 'Consulta registrada exitosamente');
    }

    /**
     * Download consultation as PDF
     */
    public function download(Consultation $consultation)
    {
        $pdf = PDF::loadView('consultations.pdf', compact('consultation'));
        return $pdf->download('consulta-' . $consultation->id . '-' . now()->format('Y-m-d') . '.pdf');
    }
}
