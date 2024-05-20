<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\File;
use App\Models\Personaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function createPersonaje()
    {
        return view('admin.personaje_add');
    }

    public function indexPersonaje()
    {
        $personajes = Personaje::all();
        return view('admin.personaje_index', compact('personajes'));
    }

    public function storePersonaje(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'serie' => 'required|string|max:255',
            'muestra' => 'nullable|file|max:10240',
            'imagen_logo' => 'nullable|file|max:10240',
            'imagen_fondo' => 'nullable|file|max:10240',
            'actor_id' => 'required|integer|exists:actor,id',
        ]);

        $input = $request->all();

        try {
            $actor = Actor::findOrFail($input['actor_id']);

            $personaje = new Personaje([
                'nombre' => $request->nombre,
                'serie' => $request->serie,
                'actor_id' => $request->actor_id,
            ]);

            $personaje->save();

            // Sube los archivos y los asocia con el personaje
            $this->filePersonaje($request->file('muestra'), 'muestra', $personaje);
            $this->filePersonaje($request->file('imagen_logo'), 'imagen_logo', $personaje);
            $this->filePersonaje($request->file('imagen_fondo'), 'imagen_fondo', $personaje);

            return redirect()->route('index')->withSuccess('Personaje creado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }


    private function filePersonaje($file, $fieldName, $personaje)
    {
        if ($file) {
            $fileModel = new File();
            $fileModel->name = $file->getClientOriginalName();
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
            'foto' => 'nullable|file|max:10240',
            'eldoblaje' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'ciudad' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        try {
            $actor = new Actor([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'estado' =>  $request->estado,
                'actores_recurrentes' => $request->actores_recurrentes,
                'eldoblaje' => $request->eldoblaje,
                'twitter' => $request->twitter,
                'ciudad' => $request->ciudad,
                'instagram' => $request->instagram,
            ]);


            if(!$request->foto){

                $actor->save();
            }
            else{

                $this->fileActor($request->file('foto'), 'foto', $actor);

            }


            return redirect()->route('index')->withSuccess('Actor creado exitosamente');
        } catch (\Exception $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    private function fileActor($file, $fieldName, $actor)
    {
        if ($file) {
            $fileModel = new File();
            $fileModel->name = $file->getClientOriginalName();
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
}
