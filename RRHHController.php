<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alta;
use App\Models\Equipo;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

class RRHHController extends Controller
{
    public function index() {
        $alta = Alta::latest()->first();
        return view('rrhh.index', compact('alta'));
    }

    public function altas(Request $request)
    {
        $buscar = $request->input('buscar');

        $altas = Alta::with('jefe')
            ->when($buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%$buscar%")
                    ->orWhere('apellidos', 'like', "%$buscar%");
            })
            ->get();

        return view('rrhh.altas', compact('altas', 'buscar'));
    }

    public function calendario() {
        $altas = Alta::select('nombre', 'apellidos', 'fecha_entrada')->get();
        return view('rrhh.calendario', compact('altas'));
    }

    public function edit($id)
    {
        $alta = Alta::findOrFail($id);
        $equipos = Equipo::all();

        $numerosSerie = $equipos->pluck('numero_serie');

        return view('rrhh.edit', compact('alta', 'numerosSerie'));
    }

    public function update(Request $request, $id)
    {
        $alta = Alta::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'email' => 'required|email',
            'departamento' => 'nullable|string|in:RRHH,Sistemas,Ciberseguridad,Ventas,Marketing,Web,Atención al Cliente',
            'fecha_entrada' => 'required|date',
            'estado' => 'required|string',
            'jefe_id' => 'required|integer',
            'numero_serie' => 'nullable|string',
        ]);

        $alta->nombre = $request->nombre;
        $alta->apellidos = $request->apellidos;
        $alta->email = $request->email;
        $alta->departamento = $request->departamento;
        $alta->fecha_entrada = $request->fecha_entrada;
        $alta->estado = $request->estado;
        $alta->jefe_id = $request->jefe_id;
        $alta->numero_serie = $request->numero_serie;

        $alta->save();

        return redirect()->route('rrhh.altas')->with('success', 'Alta actualizada correctamente.');
    }

    public function estadisticas(Request $request)
    {
        $porNombre = Equipo::select('nombre_equipo', DB::raw('count(*) as total'))
                    ->groupBy('nombre_equipo')
                    ->get();

        $estados = Equipo::select('estado', DB::raw('count(*) as total'))
                    ->groupBy('estado')
                    ->get();

        $query = Equipo::query();

        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            $query->where(function ($q) use ($buscar) {
                $q->where('serial', 'like', "%$buscar%")
                ->orWhere('nombre_equipo', 'like', "%$buscar%")
                ->orWhere('modelo', 'like', "%$buscar%");
            });
        }

        $resultados = $query->get();

        return view('rrhh.estadisticas', [
            'porNombre' => $porNombre,
            'estados' => $estados,
            'resultados' => $resultados,
            'buscar' => $request->input('buscar'),
        ]);
    }

    public function destroy($id)
    {
        $alta = Alta::findOrFail($id);
        $alta->delete();

        return redirect()->route('rrhh.altas')->with('success', 'Empleado eliminado correctamente.');
    }

    public function contacto()
    {
        $users = User::whereIn('rol', ['Jefe', 'Sistemas'])->get();

        return view('rrhh.contacto', compact('users'));
    }

    public function show(Alta $alta)
    {
        $alta->load(['equipo', 'jefe']);
        return view('rrhh.pdf.show', compact('alta'));
    }

    public function descargarPdfRRHH(Alta $alta)
    {
        $alta->load(['equipo', 'jefe']);

        $pdf = PDF::loadView('rrhh.pdf.pdf', compact('alta'));
        $nombreArchivo = 'alta_'.$alta->id.'.pdf';

        return $pdf->download($nombreArchivo);
    }
}
