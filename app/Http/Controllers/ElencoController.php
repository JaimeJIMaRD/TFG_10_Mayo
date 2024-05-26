<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Elenco;
use App\Models\File;
use App\Models\Gusta;
use App\Models\Papel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElencoController extends Controller
{
    public function index()
    {
        $elencos = Elenco::all();
        $user = Auth::user();
        $likeStatus = [];

        foreach ($elencos as $elenco) {
            $likeStatus[$elenco->id] = $user ? $user->gustas()->where('elenco_id', $elenco->id)->exists() : false;
        }

        return view('elenco.index', compact('elencos', 'likeStatus'));
    }


    public function create()
    {
        $actores = Actor::all();
        return view('elenco.create', compact('actores'));
    }

    public function guardarElenco(Request $request)
    {
        $user = Auth::user();
        $elenco = new Elenco();
        $elenco->titulo = $request->input('nombre_elenco');
        $elenco->descripcion = $request->input('descripcion_elenco');
        $elenco->user_id = $user->id;
        $elenco->save();

        if ($request->hasFile('imagen_elenco')) {
            $fileModel = new File();
            $fileModel->name = time() . '_' . uniqid();
            $request->file('imagen_elenco')->move('imagenes/', $fileModel->name);
            $fileModel->file_path = 'imagenes/' . $fileModel->name;
            $fileModel->save();
            $elenco->imagen_id = $fileModel->id;
            $elenco->save();
        }

        foreach ($request->input('papeles') as $index => $papelData) {
            $papel = new Papel();
            $papel->nombre = $papelData['personaje'];

            if (isset($papelData['actor_id'])) {
                $papel->actor_id = $papelData['actor_id'];
            } elseif (isset($papelData['actor_nombre'])) {
                $papel->nombre_actor = $papelData['actor_nombre'];
            }
            $papel->descripcion = $papelData['descripcion'];

            if ($request->hasFile('papeles.' . $index . '.archivo_muestra')) {
                $fileModel = new File();
                $fileModel->name = time() . '_' . uniqid();
                $request->file('papeles.' . $index . '.archivo_muestra')->move('imagenes/', $fileModel->name);
                $fileModel->file_path = 'imagenes/' . $fileModel->name;
                $fileModel->save();
                $papel->muestra = $fileModel->id;
            }

            $papel->elenco_id = $elenco->id;
            $papel->save();

            if ($request->hasFile('papeles.' . $index . '.imagen')) {
                $fileModel = new File();
                $fileModel->name = time() . '_' . uniqid();
                $request->file('papeles.' . $index . '.imagen')->move('imagenes/', $fileModel->name);
                $fileModel->file_path = 'imagenes/' . $fileModel->name;
                $fileModel->save();
                $papel->foto_id = $fileModel->id;
                $papel->save();
            }
        }

        return redirect()->route('elenco.index');
    }

    public function show($id)
    {
        $elenco = Elenco::findOrFail($id);
        $user = Auth::user();
        $likeStatus = [];
        $likeStatus[$elenco->id] = $user ? $user->gustas()->where('elenco_id', $elenco->id)->exists() : false;
        return view('elenco.show', compact('elenco', 'likeStatus'));
    }

    public function like($id)
    {
        $user = Auth::user();
        $elenco = Elenco::findOrFail($id);

        $existingLike = $user->gustas()->where('elenco_id', $id)->first();

        if ($existingLike) {
            $existingLike->delete();
        } else {
            $like = new Gusta();
            $like->user_id = $user->id;
            $like->elenco_id = $elenco->id;
            $like->save();
        }

        // Retorna la cantidad total de likes actualizada
        return $elenco->gustas()->count();
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('elenco.index');
        }

        $elencos = Elenco::where('titulo', 'LIKE', "%$query%")
            ->orWhere('descripcion', 'LIKE', "%$query%")
            ->orderBy('titulo')
            ->get();
        $user = Auth::user();
        $likeStatus = [];

        foreach ($elencos as $elenco) {
            $likeStatus[$elenco->id] = $user ? $user->gustas()->where('elenco_id', $elenco->id)->exists() : false;
        }
        return view('elenco.search', compact('elencos', 'likeStatus', 'query'));
    }

    public function editarElenco($id)
    {
        $elenco = Elenco::with('papeles')->findOrFail($id);
        $actores = Actor::all();
        return view('elenco.update', compact('elenco', 'actores'));
    }

    public function actualizarElenco(Request $request, $id)
    {
        $user = Auth::user();
        $elenco = Elenco::findOrFail($id);
        $elenco->titulo = $request->input('nombre_elenco');
        $elenco->descripcion = $request->input('descripcion_elenco');
        $elenco->user_id = $user->id;
        $elenco->save();

        if ($request->hasFile('imagen_elenco')) {
            $fileModel = new File();
            $fileModel->name = time() . '_' . uniqid();
            $request->file('imagen_elenco')->move('imagenes/', $fileModel->name);
            $fileModel->file_path = 'imagenes/' . $fileModel->name;
            $fileModel->save();
            $elenco->imagen_id = $fileModel->id;
            $elenco->save();
        }

        $elenco->papeles()->delete();

        foreach ($request->input('papeles') as $index => $papelData) {
            $papel = new Papel();
            $papel->nombre = $papelData['personaje'];

            if (isset($papelData['actor_id'])) {
                $papel->actor_id = $papelData['actor_id'];
            } elseif (isset($papelData['actor_nombre'])) {
                $papel->nombre_actor = $papelData['actor_nombre'];
            }
            $papel->descripcion = $papelData['descripcion'];
            $papel->elenco_id = $elenco->id;

            if ($request->hasFile('papeles.' . $index . '.archivo_muestra')) {
                $fileModel = new File();
                $fileModel->name = time() . '_' . uniqid();
                $request->file('papeles.' . $index . '.archivo_muestra')->move('imagenes/', $fileModel->name);
                $fileModel->file_path = 'imagenes/' . $fileModel->name;
                $fileModel->save();
                $papel->muestra = $fileModel->id;
            }

            if ($request->hasFile('papeles.' . $index . '.imagen')) {
                $fileModel = new File();
                $fileModel->name = time() . '_' . uniqid();
                $request->file('papeles.' . $index . '.imagen')->move('imagenes/', $fileModel->name);
                $fileModel->file_path = 'imagenes/' . $fileModel->name;
                $fileModel->save();
                $papel->foto_id = $fileModel->id;
            }

            $papel->save();
        }

        return redirect()->route('elenco.index');
    }

    public function destroy($id)
    {
        $elenco = Elenco::findOrFail($id);
        $elenco->papeles()->delete();
        $elenco->gustas()->delete();
        $elenco->comentarios()->delete();

        $elenco->delete();

        return redirect()->route('elenco.index')->with('success', 'Elenco eliminado exitosamente.');
    }


}
