<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario de creación de comentarios
        $request->validate([
            'contenido' => 'required|string|max:255', // Ajusta las reglas de validación según tus necesidades
            // Agrega más reglas de validación si es necesario
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario();
        $comentario->contenido = $request->contenido;
        $comentario->fecha = now(); // Opcional: establece la fecha del comentario
        $comentario->elenco_id = $request->elenco_id; // Asigna el ID del elenco al que pertenece el comentario
        $comentario->user_id = Auth::id(); // Asigna el ID del usuario autenticado como autor del comentario
        $comentario->save();

        // Redireccionar a la página del elenco o a donde prefieras después de guardar el comentario
        return redirect()->route('elenco.show', $request->elenco_id)->with('success', 'Comentario agregado exitosamente.');
    }

    public function destroy($id)
    {
        // Encuentra el comentario por su ID
        $comentario = Comentario::findOrFail($id);

        // Verifica si el usuario autenticado puede eliminar el comentario (puedes implementar tu propia lógica aquí)

        // Elimina el comentario
        $comentario->delete();

        // Redireccionar a la página del elenco o a donde prefieras después de eliminar el comentario
        return redirect()->back()->with('success', 'Comentario eliminado exitosamente.');
    }
}
