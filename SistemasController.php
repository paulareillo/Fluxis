<?php

namespace App\Http\Controllers;

use App\Models\Alta;
use App\Models\Equipo;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use Illuminate\Support\Facades\DB;

class SistemasController extends Controller
{
    public function index()
    {
        return view('sistemas.index');
    }

    public function altas()
    {
        $altas = Alta::with('equipo', 'jefe')->get();
        return view('sistemas.altas.index', compact('altas'));
    }

    public function show(Alta $alta)
    {
        $alta->load(['equipo', 'jefe']);
        return view('sistemas.altas.show', compact('alta'));
    }

    public function createEquipo(Alta $alta)
    {
        return view('sistemas.equipos.create', compact('alta'));
    }

    public function storeEquipo(Request $request, Alta $alta)
    {
        $request->validate([
            'nombre_equipo' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'reutilizado' => 'required|boolean',
            'fecha_entrega' => 'required|date',
        ]);

        Equipo::create([
            'alta_id' => $alta->id,
            'nombre_equipo' => $request->nombre_equipo,
            'serial' => $request->serial,
            'modelo' => $request->modelo,
            'reutilizado' => $request->reutilizado,
            'fecha_entrega' => $request->fecha_entrega,
        ]);

        $alta->update(['estado' => 'terminado']);

        return redirect()->route('sistemas.altas.index')->with('success', 'Equipo registrado correctamente.');
    }

    public function descargarPdf(Alta $alta)
    {
        $alta->load(['equipo', 'jefe']);

        $pdf = PDF::loadView('sistemas.altas.pdf', compact('alta'));
        $nombreArchivo = 'alta_'.$alta->id.'.pdf';

        return $pdf->download($nombreArchivo);
    }

    public function contacto()
    {
        $users = User::whereIn('rol', ['RRHH', 'Jefe'])->get();

        return view('sistemas.contacto', compact('users'));
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

        return view('sistemas.estadisticas', [
            'porNombre' => $porNombre,
            'estados' => $estados,
            'resultados' => $resultados,
            'buscar' => $request->input('buscar'),
        ]);
    }

    
    public function calendario() {
        $altas = Alta::select('nombre', 'apellidos', 'fecha_entrada')->get();
        return view('sistemas.calendario', compact('altas'));
    }
}
