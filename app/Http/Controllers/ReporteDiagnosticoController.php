<?php

namespace App\Http\Controllers;

use App\Models\reporteDiagnostico;
use Illuminate\Http\Request;

class ReporteDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("reporte/tipoReporte/reporteDiagnostico");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function show(reporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function edit(reporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reporteDiagnostico $reporteDiagnostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reporteDiagnostico  $reporteDiagnostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(reporteDiagnostico $reporteDiagnostico)
    {
        //
    }
}
