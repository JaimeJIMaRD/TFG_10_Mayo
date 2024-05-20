@extends('layouts.public')
@section('content')
<style>
    .like-button {
        transition: transform 0.3s ease;
        /* Estilos por defecto */
    }

    /* Estilo cuando está liked */
    .like-button.liked {
        transform: scale(1.1);
    }

    .like-button.liked img {
        background-color: rgb(138, 147, 151);
    }

    /* Estilo de hover cuando no está liked */
    .like-button:not(.liked):hover {
        transform: scale(1.1);
    }
</style>
<div class="flex bg-slate-500 z-10 w-full min-h-[90vh]" id="container">
    <div class="w-3/4 mx-auto bg-gray-100 p-5  mt-[10vh]">
        <h1 class="text-5xl mb-2 font-semibold">Título</h1>
        <p class="font-medium">Descripción descripción descripción descripción descripción descripción descripción descripción descripción
            descripción descripción descripción descripción descripción descripción descripción</p>
        <div class="w-100 h-9 bg-green-300 my-4">
            <a href="{{ route('elenco.create') }}">Crear elenco</a>
        </div>

        @foreach($elencos as $elenco)
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
            <div class="w-100 flex px-3 mb-4">
                <a href="{{ route('elenco.show', $elenco->id) }}" class="text-decoration-none w-[80%] rounded-xl p-8 flex bg-orange-300 relative hover:scale-[101%] transition-transform duration-100 ease-in-out">
                    <div class="absolute flex items-center top-2 right-1">
                        <p class="text-xs">{{ $user->name }}</p>
                        <img class="w-6 h-6 ml-2"
                             src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAXklEQVR4nO3TMQqAMBBE0V/N1Y33dOMxFCGVprDZtXAepEkzEPLB7EnACnQggDbu0jXguJ3rLl2fDO8VwzEZ3r566qViWGM8qj/X/8gd446TyB1XkTvGHSeROzZeOAGWFFJap6wQ3wAAAABJRU5ErkJggg==">
                    </div>
                    <div class="bg-white rounded-full w-[6rem] h-[6rem]" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                    <div class="text-white flex-1 ml-4">
                        <p class="text-3xl font-semibold">{{$elenco->titulo}}</p>
                        <p class="line-clamp-3">{{$elenco->descripcion}}</p>
                    </div>

                </a>
                <div class="h-full flex-1 flex flex-col ml-9 my-auto">
                    <div class="flex items-center">
                        <button class="like-button {{ $likeStatus[$elenco->id] ? 'liked' : '' }}" data-elenco-id="{{ $elenco->id }}">
                            <img class="w-9 p-1 bg-slate-300 rounded-full" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABnUlEQVR4nO3ZMUvDQBiA4RecRAWHgiBuKg4OLt3durgWHN2dRbA6+g8KDo5dCqW4dFMnxbEgdBAHf4CVllpF0MGTQgpFLuldosl9R164qSTkoWm+NIG8PHHdASpYn8A1sInAlGb1gS08gCjgCZjDA4gCTvAE0gNm8QCigF08gdTwBPKIgGYMIO8IaMcAMkBAFwaQexxvCfgygJzjeIcGiNHaw/EeDBDfwDIOt234bbRxvJoh5PQ/D+LW8CAm12ibcYvAR4x92K5hcFXcCIO8xdzxuP0UEOrXjeeKDtJJCGmnDFFAQwdpJYSoDNarDlIVCOnpIAcCIQ0dpCwM0gfWdJCiMEiJkArCIHUiGgqCdKMgHUGQXhSkJQjSiIJUhUD6YVesJLMkC0iJKZWFQOrTIEUhkO40SMEXSJz/JU6eWnFmybi0EM/AKgaFzZKj4AVNJUPIlSkiapbMB58vZAipY1HYLKkEmOMMIS82ENtZkiZkYAMpOgxp2kBsZ0nShxc2d7vrWHZpuPObiW1Gv5+z4Dz+6yclzTiIvLw8D/sBLsSN+7T0tOMAAAAASUVORK5CYII=">
                        </button>

                        <p class="font-medium ml-1.5">{{ $likes }}</p>
                    </div>
                    <div class="flex items-center mt-4">
                        <button>
                            <img class="w-9 p-1 bg-slate-300 rounded-full hover:scale-110"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABH0lEQVR4nO2ZPU7DQBCFP/EjGq5CS5cTxJTcgjtQEFFQ5hooJ0BJChpugEjFFRKnRRNF2gIRr+2VkGZWep/0Gjd+b96OCy8IIUq5A9bAHrBg2gMroBkK8RzArI3UrK8Jq0xNV5B1AGNWqGVXkDaAMSvUriuIVaoTvA0piBrB/ziZdgT/yZsawX/apkbwn7CpkYT3ZNXIX7wnq0bUCLF0grchBVEj+B8n045QUSNtAFNWqG1XkFUAY/Yfv0ybAMasUFMyzAKYs5F6yoX43cwy6M60yVu2ibFsRrzsgQr4HAjxDVwRnIt0H9EX5J4KmAyEmFMB58BHT4gFcElwroHXTIAf4AU4owLeMyGOz2+piLd0Uf+VvuGPwI23KSEERRwAhWs7uF5yrcgAAAAASUVORK5CYII=">
                        </button>
                        <p class="ml-1.5 font-medium">{{ $comentarios }}</p>
                    </div>
                </div>
            </div>
        @endforeach

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

                    // Toggle de clase 'liked' para cambiar el estado visual del botón
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
