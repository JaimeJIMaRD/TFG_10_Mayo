<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        $actor = Actor::orderBy('apellido')->get()->groupBy(function($item) {
            return strtoupper(substr($item->apellido, 0, 1));
        });
        return view('actor.index', compact('actor'));
    }

        public function show($id)
        {
            $actor = Actor::findOrFail($id);
            $actor->actores_recurrentes = json_decode($actor->actores_recurrentes);
            $personajes = $actor->personajes;

            return view('actor.show', compact('actor', 'personajes'));
        }

    public function getActorName($actor_id)
    {
        $actor = Actor::findOrFail($actor_id);
        $nombre_completo = $actor->nombre . ' ' . $actor->apellido;
        return $nombre_completo;
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        if (!$query) {
            return redirect()->route('index');
        }

        $actor = Actor::where('nombre', 'LIKE', "%$query%")
            ->orWhere('apellido', 'LIKE', "%$query%")
            ->orderBy('apellido')
            ->get();

        return view('actor.search', compact('actor', 'query'));
    }

}

