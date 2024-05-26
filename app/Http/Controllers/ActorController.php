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
        $ultimos = Actor::orderBy('created_at', 'desc')->take(3)->get();

        $agregados = Actor::whereHas('personajes', function ($query) {
            $query->orderBy('created_at', 'desc');
        })->orderBy('updated_at', 'desc')->take(3)->get();
        return view('actor.index', compact('actor', 'ultimos', 'agregados'));
    }

        public function show($id)
        {
            $actor = Actor::findOrFail($id);
            $actor->actores_recurrentes = json_decode($actor->actores_recurrentes);
            $personajes = $actor->personajes;

            return view('actor.show', compact('actor', 'personajes'));
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

