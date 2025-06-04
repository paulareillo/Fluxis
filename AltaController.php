<?php

namespace App\Http\Controllers;

use App\Models\Alta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AltaController extends Controller
{
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $query = Alta::where('jefe_id', Auth::id());

        if ($buscar) {
            $query->where(function ($q) use ($buscar) {
                $q->where('nombre', 'like', "%{$buscar}%")
                ->orWhere('apellidos', 'like', "%{$buscar}%")
                ->orWhere('email', 'like', "%{$buscar}%");
            });
        }

        $altas = $query->get();

        return view('altas.index', compact('altas', 'buscar'));
    }

    public function create()
    {
        return view('altas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|email|unique:altas,email',
            'departamento' => 'required|string|max:255',
            'fecha_entrada' => 'required|date',
        ]);

        Alta::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'departamento' => $request->departamento,
            'fecha_entrada' => $request->fecha_entrada,
            'jefe_id' => Auth::id(),
            'estado' => 'pendiente',
        ]);

        return redirect()->route('altas.index')->with('success', 'Alta registrada correctamente.');
    }
}