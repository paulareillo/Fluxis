<?php

namespace App\Http\Controllers;

use App\Models\Alta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JefeController extends Controller
{
    public function index()
    {
        return view('jefe.index');
    }


    public function calendario()
    {
        $altas = Alta::where('jefe_id', Auth::id())
                    ->select('nombre', 'apellidos', 'fecha_entrada')
                    ->get();

        return view('jefe.calendario', compact('altas'));
    }

    public function contacto()
    {
        $users = User::whereIn('rol', ['RRHH', 'Sistemas'])->get();

        return view('jefe.contacto', compact('users'));
    }
}
