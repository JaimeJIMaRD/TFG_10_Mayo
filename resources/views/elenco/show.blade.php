@extends('layouts.public')
@section('content')
<div class="flex bg-slate-500 z-10 w-full min-h-[100vh]" id="container">
    <div class="w-3/4 mx-auto bg-gray-100 px-5 pt-[10vh]">
        <div class="w-3/4 bg-orange-300 flex px-7 py-5 mx-auto mt-0 rounded-b-lg">
            <div class="flex-column justify-center">
                @php
                    $file = \App\Models\File::find($elenco->imagen_id);
                    if($file) {
                        $imagen_imagen = url($file->file_path);
                    } else {
                        $imagen_imagen = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                    }
                @endphp
                <div class="bg-white rounded-full w-[6rem] h-[6rem]" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_imagen }});"></div>
                <p class="text-xs w-full text-center my-3">{{ $elenco->nombre }}</p>
            </div>
            <div class="flex-1 px-5">
                <h1 class="mt-3 font-semibold text-4xl">{{ $elenco->titulo }}</h1>
                <p class="mt-2 text-sm">{{ $elenco->descripcion }}</p>
            </div>
        </div>
        <h2 class="mt-7 font-bold text-3xl text-center">Reparto</h2>
        <div class="w-3/5 mx-auto">
            @foreach($elenco->papeles as $personaje)
                @php
                    $file = \App\Models\File::find($personaje->foto_id);
                    if($file) {
                        $imagen_foto = url($file->file_path);
                    } else {
                        $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                    }
                @endphp
                <div class="flex w-full justify-between mt-8 {{ $personaje->descripcion ? 'mb-3' : 'mb-8' }} relative">
                    <div class="bg-slate-400 w-20 aspect-square rounded-sm" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                    <div class="flex-1 flex flex-col justify-between h-20 mx-2">
                        <p class="self-start font-medium">{{ $personaje->nombre }}</p>
                        @if($personaje->actor_id)
                            @php
                                $actor = App\Models\Actor::find($personaje->actor_id);
                                $filemon = \App\Models\File::find($actor->foto_id);
                                    if($filemon) {
                                        $imagen_foto = url($filemon->file_path);
                                    } else {
                                        $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                    }
                            @endphp
                            @if($actor)
                                <p class="self-end font-semibold">{{ $actor->nombre }} {{ $actor->apellido }}</p>
                            @endif
                        @else
                            <p class="self-end font-semibold">{{ $personaje->nombre_actor }}</p>
                        @endif
                    </div>
                    @if($personaje->actor_id)
                        <a href="{{ route('actor.show', $actor->id) }}">
                        <div class="bg-slate-400 w-20 aspect-square rounded-full" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                        </a>
                    @else
                        <div class="bg-slate-400 w-20 aspect-square rounded-full" style="background-size: 100%; background-position: center; background-image: url('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');"></div>
                    @endif
                </div>
                @if($personaje->descripcion)
                <p class="mb-3.5 w-[90%] mx-auto">{{$personaje->descripcion}}</p>
                @endif
            @endforeach
        </div>
        @php
            $user = App\Models\User::find($elenco->user_id);
            $likes = $elenco->gustas()->count();
            $comentarios = $elenco->comentarios()->count();
            $file = \App\Models\File::find($elenco->imagen_id);
            if($file) {
                $imagen_foto = url($file->file_path);
            } else {
                $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
            }
        @endphp
        <div class="flex items-center">
            <button class="like-button {{ $likeStatus[$elenco->id] ? 'liked' : '' }}" data-elenco-id="{{ $elenco->id }}">
                <img class="w-9 p-1 bg-slate-300 rounded-full" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABnUlEQVR4nO3ZMUvDQBiA4RecRAWHgiBuKg4OLt3durgWHN2dRbA6+g8KDo5dCqW4dFMnxbEgdBAHf4CVllpF0MGTQgpFLuldosl9R164qSTkoWm+NIG8PHHdASpYn8A1sInAlGb1gS08gCjgCZjDA4gCTvAE0gNm8QCigF08gdTwBPKIgGYMIO8IaMcAMkBAFwaQexxvCfgygJzjeIcGiNHaw/EeDBDfwDIOt234bbRxvJoh5PQ/D+LW8CAm12ibcYvAR4x92K5hcFXcCIO8xdzxuP0UEOrXjeeKDtJJCGmnDFFAQwdpJYSoDNarDlIVCOnpIAcCIQ0dpCwM0gfWdJCiMEiJkArCIHUiGgqCdKMgHUGQXhSkJQjSiIJUhUD6YVesJLMkC0iJKZWFQOrTIEUhkO40SMEXSJz/JU6eWnFmybi0EM/AKgaFzZKj4AVNJUPIlSkiapbMB58vZAipY1HYLKkEmOMMIS82ENtZkiZkYAMpOgxp2kBsZ0nShxc2d7vrWHZpuPObiW1Gv5+z4Dz+6yclzTiIvLw8D/sBLsSN+7T0tOMAAAAASUVORK5CYII=">
            </button>

            <p class="font-medium ml-1.5">{{ $likes }}</p>
        </div>

        <div class="mt-8">
            <h2 class="text-lg font-semibold mb-4">Comentarios</h2>

            @auth
                <form action="{{ route('comentario.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="elenco_id" value="{{ $elenco->id }}">
                    <textarea name="contenido" class="w-full border rounded-md p-2" rows="3" placeholder="Escribe tu comentario aquí..."></textarea>
                    <button type="submit" class="mt-2 mb-5 px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600">Enviar Comentario</button>
                </form>
            @else
                <p>Debes iniciar sesión para dejar un comentario.</p>
            @endauth

            @if($elenco->comentarios->count() > 0)
                <ul>
                    @foreach($elenco->comentarios as $comentario)
                        <li>
                            <p>{{ $comentario->contenido }}</p>
                            <p class="text-sm text-gray-500">Publicado por: {{ $comentario->usuario->name }} el {{ $comentario->created_at->format('d/m/Y H:i') }}</p>

                            @if(Auth::check() && $comentario->user_id === Auth::user()->id)
                                <form action="{{ route('comentario.destroy', $comentario->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                </form>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No hay comentarios.</p>
            @endif

        </div>
    </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const likeButtons = document.querySelectorAll('.like-button');

        likeButtons.forEach(button => {
            button.addEventListener('click', async function () {
                console.log('Botón de like clickeado');
                const elencoId = this.getAttribute('data-elenco-id'); // Obtener el ID del elenco del atributo dataset
                console.log('ID del elenco:', elencoId); // Depuración
                const response = await fetch(`/elenco/${elencoId}/like`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                if (response.ok) {
                    const likesCount = await response.text();
                    button.nextElementSibling.textContent = likesCount;

                    button.classList.toggle('liked');
                } else {
                    console.error('Error al dar like');
                }
            });
        });
    });
</script>
</body>

</html>

@endsection
