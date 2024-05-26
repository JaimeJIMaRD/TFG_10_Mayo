<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string|max:255', // Ajusta las reglas de validación según tus necesidades
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->fecha = now(); // Opcional: establece la fecha del comentario
        $comentario->elenco_id = $request->elenco_id; // Asigna el ID del elenco al que pertenece el comentario
        $comentario->user_id = Auth::id(); // Asigna el ID del usuario autenticado como autor del comentario
        $comentario->save();

        return redirect()->route('elenco.show', $request->elenco_id)->with('success', 'Comentario agregado exitosamente.');
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
    }
}
