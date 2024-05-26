<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\File;
use App\Models\Otro_Actor;
use App\Models\Personaje;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function createPersonaje()
    {
        $actores = Actor::all();
        return view('admin.personaje_add', compact('actores'));
    }

    public function indexPersonaje()
    {
        $personajes = Personaje::all();
        return view('admin.personaje_index', compact('personajes'));
    }

    public function storePersonaje(Request $request)
    {
        $input = $request->all();
        $personaje = new Personaje();
        $personaje->nombre = $request->input('nombre');
        $personaje->serie = $request->input('serie');
        $personaje->actor_id = $request->input('actor_id');
        $personaje->actor_original = $request->input('actor_original');

        // Sube los archivos y los asocia con el personaje
        $this->filePersonaje($request->file('muestra'), 'muestra', $personaje);
        $this->filePersonaje($request->file('imagen_logo'), 'imagen_logo', $personaje);
        $this->filePersonaje($request->file('imagen_fondo'), 'imagen_fondo', $personaje);

        $personaje->save();

        if ($request->otros_actores) {
            foreach ($request->input('otros_actores') as $index => $actorData) {
                $otroActor = new Otro_Actor();
                $otroActor->nombre_actor = $actorData['nombre'];
                $otroActor->contexto = $actorData['contexto'];
                $otroActor->personaje_id = $personaje->id;
                $otroActor->save();
            }
        }

        return redirect()->route('admin.personajes.index')->withSuccess('Personaje creado exitosamente');
    }



    private function filePersonaje($file, $fieldName, $personaje)
    {
        if ($file) {
            $fileModel = new File();
            $fileModel->name = time() . '_' . uniqid();
            $file->move('imagenes/', $fileModel->name);
            $fileModel->file_path = 'imagenes/' . $fileModel->name;
            $fileModel->save();
            $personaje->{$fieldName . '_id'} = $fileModel->id;
            $personaje->save();
        }
    }


    public function deletePersonaje($id)
    {
        try {
            $personaje = Personaje::findOrFail($id);
            $personaje->delete();


            return redirect()->route('admin.personajes.index')->withSuccess('Personaje eliminado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }

    public function createActor()
    {
        return view('admin.actor_add');
    }

    public function indexActor()
    {
        $actores = Actor::all();
        return view('admin.actor_index', compact('actores'));
    }


    public function storeActor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'estado' => 'required|integer|between:0,2',
            'actores_recurrentes' => 'nullable|array',
            'actores_recurrentes.*' => 'nullable|string',
            'foto' => 'nullable|file|max:10240',
            'eldoblaje' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'cumpleanos' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            $actores_recurrentes_json = json_encode($request->actores_recurrentes);

            $actor = new Actor([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'estado' => $request->estado,
                'actores_recurrentes' => $actores_recurrentes_json,
                'eldoblaje' => $request->eldoblaje,
                'twitter' => $request->twitter,
                'ciudad' => $request->ciudad,
                'instagram' => $request->instagram,
                'cumpleanos' => $request->cumpleanos,
            ]);

            if ($request->hasFile('foto')) {
                $this->fileActor($request->file('foto'), 'foto', $actor);
            }

            $actor->save();

            return redirect()->route('admin.actores.index')->withSuccess('Actor creado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


    private function fileActor($file, $fieldName, $actor)
    {
        if ($file) {
            $fileModel = new File();
            $fileModel->name = time() . '_' . uniqid();
            $file->move('imagenes/', $fileModel->name);
            $fileModel->file_path = 'imagenes/' . $fileModel->name;
            $fileModel->save();
            $actor->{$fieldName . '_id'} = $fileModel->id;
            $actor->save();
        }
    }

    public function deleteActor($id)
    {
        try {
            $actor = Actor::findOrFail($id);
            $actor->delete();


            return redirect()->route('admin.actor.index')->withSuccess('Actor eliminado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }

    public function updateActor(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'estado' => 'required|integer|between:0,2',
            'actores_recurrentes' => 'nullable|array',
            'actores_recurrentes.*' => 'nullable|string',
            'foto' => 'nullable|file|max:10240',
            'eldoblaje' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'cumpleanos' => 'nullable|date',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            $actor = Actor::findOrFail($id);
            $actores_recurrentes_json = json_encode($request->actores_recurrentes);

            $actor->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'estado' => $request->estado,
                'actores_recurrentes' => $actores_recurrentes_json,
                'eldoblaje' => $request->eldoblaje,
                'twitter' => $request->twitter,
                'ciudad' => $request->ciudad,
                'instagram' => $request->instagram,
                'cumpleanos' => $request->cumpleanos,
            ]);
            if ($request->hasFile('foto')) {
                $this->fileActor($request->file('foto'), 'foto', $actor);
            }

            return redirect()->route('admin.actores.index')->withSuccess('Actor actualizado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function editActor($id)
    {
        try {
            $actor = Actor::findOrFail($id);
            return view('admin.actor_update', compact('actor'));
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage());
        }
    }

    public function updatePersonaje(Request $request, $id)
    {
        $personaje = Personaje::findOrFail($id);
        $personaje->nombre = $request->input('nombre');
        $personaje->serie = $request->input('serie');
        $personaje->actor_id = $request->input('actor_id');
        $personaje->actor_original = $request->input('actor_original'); // Agregar actor_original

        $this->filePersonaje($request->file('muestra'), 'muestra', $personaje);
        $this->filePersonaje($request->file('imagen_logo'), 'imagen_logo', $personaje);
        $this->filePersonaje($request->file('imagen_fondo'), 'imagen_fondo', $personaje);

        $personaje->save();

        Otro_Actor::where('personaje_id', $personaje->id)->delete();

        if ($request->otros_actores) {
            foreach ($request->input('otros_actores') as $actorData) {
                $otroActor = new Otro_Actor();
                $otroActor->nombre_actor = $actorData['nombre'];
                $otroActor->contexto = $actorData['contexto'];
                $otroActor->personaje_id = $personaje->id; // Asigna el ID del personaje
                $otroActor->save();
            }
        }

        return redirect()->route('admin.personajes.index')->withSuccess('Personaje actualizado exitosamente');
    }




    public function editPersonaje($id)
    {
        $actores = Actor::all();
        $personaje = Personaje::with('otros_actores')->findOrFail($id);
        return view('admin.personaje_update', compact('personaje'), compact('actores'));
    }

    public function changeUserRole($id)
    {
        $user = User::findOrFail($id);
        $user->rol = $user->rol == 0 ? 1 : 0;
        $user->save();

        return redirect()->route('admin.user.index')->withSuccess('Rol de usuario actualizado exitosamente');
    }

    public function indexUser()
    {
        $users = User::all();
        return view('admin.user_index', compact('users'));
    }

}
