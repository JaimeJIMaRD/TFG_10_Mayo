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
        background-color: rgb(34 211 238);
    }

    /* Estilo de hover cuando no está liked */
    .like-button:not(.liked):hover {
        transform: scale(1.1);
    }
</style>
<div class="flex bg-gray-700 z-10 w-full min-h-[100vh]" id="container">
    <div class="w-[87%] md:w-3/4 mx-auto bg-gray-100 p-5 pt-[10vh] shadow-md">
        <h1 class="text-3xl mb-4 mt-7 text-center font-semibold">Elencos</h1>

        <p class="text-center md:w-2/3 mx-auto mb-7">
            Esta es la sección de elencos de Doblapedia. Aquí podrás tanto ver como crear agrupaciones de papeles y personajes e imaginar que voces tendrían en castellano.        </p>

        <div class="w-100 md:h-9 flex-col md:flex-row flex justify-between my-4 px-2">
            <a href="{{ route('elenco.create') }}" class="px-2 py-1.5 hover:scale-105 transition-transform duration-100 ease-in-out flex my-auto bg-cyan-400 mx-auto md:mx-0 md:w-fit w-1/2 text-white font-bold rounded">
                <svg class="mr-2 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                Crear elenco</a>
            <form id="search-form" action="{{ route('elenco.search') }}" method="GET" class="relative w-full md:w-1/2 my-auto mt-4 md:mt-0">
                <input type="text" id="search-input" name="q" placeholder="Buscar elenco..."
                       class="px-3 py-1 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500">
                <button type="submit" class="absolute top-1/2 transform bg-cyan-500 bg-opacity-70 hover:bg-cyan-300 -translate-y-1/2 p-1.5 hover:bg-opacity-100 text-white right-1.5 rounded-full"><svg class="w-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg></button>
            </form>
        </div>

        @foreach($elencos as $elenco)
            @php
                $user = App\Models\User::find($elenco->user_id);
                $likes = $elenco->gustas()->count();
                $comentarios = $elenco->comentarios()->count();
                $papeles = $elenco->papeles()->count();

                $file = \App\Models\File::find($elenco->imagen_id);
                if($file) {
                    $imagen_foto = url($file->file_path);
                } else {
                    $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                }
            @endphp

            <div class="w-100 flex px-3 mb-4">
                <a href="{{ route('elenco.show', $elenco->id) }}" class="text-decoration-none w-full md:w-[87%] border border-gray-300 shadow-sm hover:shadow-md rounded-xl p-2 md:p-8 hidden md:flex bg-white relative hover:scale-[101%] transition-transform duration-100 ease-in-out">
                    <div class="absolute flex items-center top-2 right-1 px-2 text-black">
                        <p class="text-xs font-bold mr-1">Creado por:</p><p class="text-xs"> {{ $user->name }}</p>
                    </div>
                    <div class="bg-white border border-gray-300 rounded-full w-[6rem] h-[6rem]" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                    <div class="text-black flex-1 ml-4">
                        <p class="text-3xl font-semibold md:border-b-4 line-clamp-1 pb-1 w-fit md:pr-8 border-cyan-400">{{$elenco->titulo}}</p>
                        <p class="line-clamp-3 pt-2 leading-6 pr-12">{{$elenco->descripcion}}</p>
                    </div>
                    <div class="absolute right-3 flex bottom-2">
                        <div class="w-4 mr-2">
                            <p class="text-center text-xs font-bold">{{$comentarios}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z"/></svg>                        </div>
                        <div class="w-5">
                            <p class="text-center text-xs font-bold">{{$papeles}}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                        </div>
                    </div>
                </a>
                <a href="{{ route('elenco.show', $elenco->id) }}" class="text-decoration-none w-full md:w-[87%] border border-gray-300 shadow-sm hover:shadow-md rounded-xl p-2 md:p-8 md:hidden bg-white relative hover:scale-[101%] transition-transform duration-100 ease-in-out">
                    <div class="text-black mt-2 mb-3 border-b-2 border-cyan-400 mx-auto text-center">
                        <p class="text-lg text-center mx-auto font-semibold line-clamp-1 pb-0.5 w-fit md:pr-8 border-cyan-400">{{$elenco->titulo}}</p>
                    </div>
                    <div class="w-full flex">
                        <div class="bg-white border border-gray-300 rounded-full w-1/3 md:w-[6rem] aspect-square" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                        <div class="w-2/3 relative">
                            <div class="flex justify-center mt-2">
                                <div class="w-5">
                                    <p class="text-center text-xs font-bold">{{$papeles}}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                                </div>
                                <div class="w-4 mx-3">
                                    <p class="text-center text-xs font-bold">{{$comentarios}}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z"/></svg>                        </div>
                                <div class="w-4">
                                    <p class="text-center text-xs font-bold">{{$likes}}</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg>
                                </div>
                            </div>
                            <div class="pb-1 w-fit absolute right-0 bottom-0 flex h-fit">
                                <p class="text-xs font-bold mr-2">Creado por:</p><p class="text-xs"> {{ $user->name }}</p>
                            </div>
                        </div>
                     </div>



                </a>
                <div class="h-full flex-1 hidden flex-col ml-9 my-auto md:flex">
                    <div class="w-fit items-center flex flex-col">
                        <button class="order-2 like-button {{ $likeStatus[$elenco->id] ? 'liked' : '' }}" data-elenco-id="{{ $elenco->id }}">
                            <img class="w-9 p-1 bg-slate-300 rounded-full" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABnUlEQVR4nO3ZMUvDQBiA4RecRAWHgiBuKg4OLt3durgWHN2dRbA6+g8KDo5dCqW4dFMnxbEgdBAHf4CVllpF0MGTQgpFLuldosl9R164qSTkoWm+NIG8PHHdASpYn8A1sInAlGb1gS08gCjgCZjDA4gCTvAE0gNm8QCigF08gdTwBPKIgGYMIO8IaMcAMkBAFwaQexxvCfgygJzjeIcGiNHaw/EeDBDfwDIOt234bbRxvJoh5PQ/D+LW8CAm12ibcYvAR4x92K5hcFXcCIO8xdzxuP0UEOrXjeeKDtJJCGmnDFFAQwdpJYSoDNarDlIVCOnpIAcCIQ0dpCwM0gfWdJCiMEiJkArCIHUiGgqCdKMgHUGQXhSkJQjSiIJUhUD6YVesJLMkC0iJKZWFQOrTIEUhkO40SMEXSJz/JU6eWnFmybi0EM/AKgaFzZKj4AVNJUPIlSkiapbMB58vZAipY1HYLKkEmOMMIS82ENtZkiZkYAMpOgxp2kBsZ0nShxc2d7vrWHZpuPObiW1Gv5+z4Dz+6yclzTiIvLw8D/sBLsSN+7T0tOMAAAAASUVORK5CYII=">
                        </button>

                        <p class="order-1 font-medium text-center mb-1">{{ $likes }}</p>

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
                const elencoId = this.getAttribute('data-elenco-id'); // Obtener el ID del elenco del atributo dataset
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
