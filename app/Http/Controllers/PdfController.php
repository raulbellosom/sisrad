<?php

namespace App\Http\Controllers;
use App\Models\Reporte;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function getAllPdfController()
    {
        $id = Auth::id();
        $reportes = Reporte::all()->where('iddocente','=',$id);
        return view('reporte.export', compact('reportes'));
    }

    public function downloadPDF(){
        $id = Auth::id();
        $reportes = Reporte::all()->where('iddocente','=',$id);
        $pdf = PDF::loadView('reporte.export', compact('reportes'))->setPaper('letter', 'landscape');// horizontal
        // $pdf = PDF::loadView('reporte.export', compact('reportes'))->setPaper('letter', 'portrait'); //vertical

        return $pdf->download('reporte.pdf');
    }

    public function guest()
    {
        return view("docente.guest");
    }
}
