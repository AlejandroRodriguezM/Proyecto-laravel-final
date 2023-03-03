<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'nullable|regex:/^[a-zA-Z0-9]+$/|min:1'
            // El campo no es requerido, pero si se proporciona, debe tener una longitud mínima de 1 y solo permitir letras y números
        ]);

        if ($request->has('q')) {
            $term = strtolower($request->input('q'));

            $resultados = DB::table('articulos')
                ->whereRaw('LOWER(titulo) LIKE ?', ['%' . $term . '%'])
                ->orWhereRaw('LOWER(contenido) LIKE ?', ['%' . $term . '%'])
                ->get();

            return view('busqueda', compact('resultados'));
        } else {
            return back(); // redirige al usuario a la página anterior
        }
    }
}
