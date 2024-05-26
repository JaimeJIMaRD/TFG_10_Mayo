@extends('layouts.public')
@section('content')
    <style>
        .like-button {
            transition: transform 0.3s ease;
        }

        /* Estilo cuando está liked */
        .like-button.liked {
            transform: scale(1.1);
        }

        .like-button.liked svg {
            fill: rgb(34 211 238);
        }

        .like-button:not(.liked):hover {
            transform: scale(1.1);
        }
    </style>
    <div class="flex bg-gray-700 w-full min-h-[100vh]" id="container" >
        <div class="pt-[10vh] w-[87%] md:w-3/4 mx-auto bg-gray-50 md:p-5 shadow-md">
            <div class="md:w-3/4 w-[95%] md:pt-[10vh] bg-white border-l border-r relative border-b border-gray-300 shadow-md md:flex px-2 md:px-7 py-5 mx-auto mt-0 rounded-b-lg">
                @if(Auth::check() && $elenco->user_id === Auth::user()->id || Auth::user()->rol === 1)
                    <div class="absolute flex top-2 md:top-0 right-2 md:pt-[8vh]">
                        <a href="{{ route('elenco.editar', ['id' => $elenco->id]) }}" class="inline-flex items-center">
                        <svg class="w-5 hover:scale-105 transition-transform duration-100 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
                        </a>
                        <form action="{{ route('elenco.destroy', $elenco->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:scale-105 transition-transform duration-100 ease-in-out">
                                <svg class="ml-3 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                            </button>
                        </form>
                    </div>
                @endif

                <div class="px-2 md:px-0 md:block flex justify-center">
                    @php
                        $file = \App\Models\File::find($elenco->imagen_id);
                        if($file) {
                            $imagen_imagen = url($file->file_path);
                        } else {
                            $imagen_imagen = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                        }
                        $likes = $elenco->gustas()->count();
                        $comentarios = $elenco->comentarios()->count();
                        $papeles = $elenco->papeles()->count();
                    @endphp

                    <div class="bg-white rounded-full w-[6rem] aspect-square" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_imagen }});"></div>

                    <div class="flex mx-auto justify-center h-fit my-auto md:mt-2">
                        <div class="md:w-5 w-9">
                            <p class="text-center text-md md:text-xs font-bold">{{$papeles}}</p>
                            <svg class="pt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                        </div>
                        <div class="md:w-4 w-7 mx-3">
                            <p class="text-center text-md md:text-xs font-bold">{{$comentarios}}</p>
                            <svg class="pt-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 240c0 114.9-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6C73.6 471.1 44.7 480 16 480c-6.5 0-12.3-3.9-14.8-9.9c-2.5-6-1.1-12.8 3.4-17.4l0 0 0 0 0 0 0 0 .3-.3c.3-.3 .7-.7 1.3-1.4c1.1-1.2 2.8-3.1 4.9-5.7c4.1-5 9.6-12.4 15.2-21.6c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208z"/></svg>                        </div>
                        <div class="md:w-4 w-7 pb-2">
                            <div class="flex flex-col">
                                <button class="like-button order-2 {{ $likeStatus[$elenco->id] ? 'liked' : '' }}" data-elenco-id="{{ $elenco->id }}">
                                    <svg class="w-full pt-0.5 order-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"/></svg>
                                </button>

                                <p class="text-center text-md md:text-xs font-bold">{{ $likes }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex-1 px-2 md:px-5">
                    <h1 class="mt-3 font-semibold text-xl text-center md:text-start md:text-2xl">{{ $elenco->titulo }}</h1>
                    <p class="md:mt-2 mt-4 text-sm">{{ $elenco->descripcion }}</p>
                </div>
            </div>
            <h2 class="mt-7 font-bold text-3xl text-center">Reparto</h2>
            <div class="md:w-3/5 w-[95%] mx-auto">
                @foreach($elenco->papeles as $personaje)
                    @php
                        $file = \App\Models\File::find($personaje->foto_id);
                        if($file) {
                            $imagen_foto = url($file->file_path);
                        } else {
                            $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                        }

                        $filemono = \App\Models\File::find($personaje->muestra);
                        if($filemono) {
                            $muestra_audio = url($filemono->file_path);
                        } else {
                            $muestra_audio = null;
                        }
                    @endphp
                <div class="relative">
                    <div class="flex w-full justify-between mt-8 {{ $personaje->descripcion ? 'mb-3' : 'mb-8' }} relative">
                        <div class="bg-slate-400 w-20 aspect-square rounded-sm" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                        <div class="flex-1 flex flex-col justify-between h-20 mx-2">
                            <p class="self-start text-sm md:text-md line-clamp-1 font-medium">{{ $personaje->nombre }}</p>
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
                                    <p class="self-end line-clamp-1 text-sm md:text-md font-semibold">{{ $actor->nombre }} {{ $actor->apellido }}</p>
                                @endif
                            @else
                                <p class="self-end line-clamp-1 text-sm md:text-md font-semibold">{{ $personaje->nombre_actor }}</p>
                            @endif
                        </div>
                        @if($personaje->actor_id)
                            <a href="{{ route('actor.show', $actor->id) }}">
                                <div class="bg-slate-400 w-20 aspect-square rounded-full" style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"></div>
                            </a>
                        @else
                            <div class="bg-slate-400 w-20 aspect-square rounded-full" style="background-size: 100%; background-position: center; background-image: url('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');"></div>
                        @endif
                        @if($personaje->muestra)
                            <div class="hover:scale-105 transition-transform duration-100 ease-in-out w-8 md:w-9 absolute md:right-[-2.5rem] right-[-0.3rem] top-[-1.2rem] md:top-auto md:bottom-0 boton-muestra" onclick="cambiarvideo(' {{ $muestra_audio }} ')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M533.6 32.5C598.5 85.2 640 165.8 640 256s-41.5 170.7-106.4 223.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C557.5 398.2 592 331.2 592 256s-34.5-142.2-88.7-186.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM473.1 107c43.2 35.2 70.9 88.9 70.9 149s-27.7 113.8-70.9 149c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C475.3 341.3 496 301.1 496 256s-20.7-85.3-53.2-111.8c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zm-60.5 74.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3z"/></svg>
                            </div>
                        @endif
                    </div>
                    @if($personaje->descripcion)
                        <p class="mb-3.5 w-[90%] text-center mx-auto">{{$personaje->descripcion}}</p>
                    @endif

                </div>
                @endforeach
            </div>
            @php
                $user = App\Models\User::find($elenco->user_id);
                $comentarios = $elenco->comentarios()->count();
                $file = \App\Models\File::find($elenco->imagen_id);
                if($file) {
                    $imagen_foto = url($file->file_path);
                } else {
                    $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                }
            @endphp


            <div class="mt-12 w-2/3 mx-auto pb-16">
                <h2 class="text-lg text-center font-semibold mb-4 flex-col flex">Comentarios</h2>
                @auth
                    <form action="{{ route('comentario.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="elenco_id" value="{{ $elenco->id }}">
                        <textarea name="contenido" class="w-full border rounded-md p-2" rows="3" placeholder="Escribe tu comentario aquí..."></textarea>
                        <div class="mx-auto w-fit">
                            <button type="submit" class="mt-2 mb-5 px-3 py-1 bg-cyan-400 text-white rounded-md hover:bg-cyan-500 transition-transform duration-100 ease-in-out">Enviar Comentario</button>
                        </div>
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

                                @if(Auth::check() && $comentario->user_id === Auth::user()->id || Auth::user()->rol === 1)
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
                    <p class="text-center md:text-start mx-auto">No hay comentarios.</p>
                @endif

            </div>
        </div>
        <dialog id="favDialog" class="rounded-3xl">
            <div class="flex justify-end p-4">
                <button id="cancel" type="reset" class="text-[#AEB0AE] select-none">
                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                </button>
            </div>
            <form method="dialog" class="">
                <section class="px-5 pb-5">
                    <video class="aspect-video h-[60vh] hidden" controls id="videoPop">
                    </video>
                    <audio class="my-auto hidden" controls id="audioPop"></audio>
                </section>
            </form>
        </dialog>
    </div>
    <script>
        (function () {
            var updateButtons = document.querySelectorAll(".boton-muestra");
            var cancelButton = document.getElementById("cancel");
            var favDialog = document.getElementById("favDialog");

            updateButtons.forEach(function(button) {
                button.addEventListener("click", function () {
                    favDialog.showModal();

                });
            });

            cancelButton.addEventListener("click", function () {
                favDialog.close();
                document.getElementById('audioPop').pause();
                document.getElementById('videoPop').pause();
            });
        })();


        document.addEventListener('DOMContentLoaded', function () {
            const likeButtons = document.querySelectorAll('.like-button');

            likeButtons.forEach(button => {
                button.addEventListener('click', async function () {
                    const elencoId = this.getAttribute('data-elenco-id');
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

        function cambiarvideo(url){
            var extension = url.split('.').pop();
            if (extension==='mp4 '){
                document.getElementById("videoPop").setAttribute('src', url);
                document.getElementById('videoPop').classList.remove("hidden");
                document.getElementById('audioPop').classList.add("block");
            }else if (extension==='mp3 '){
                document.getElementById("audioPop").setAttribute('src', url);
                document.getElementById('audioPop').classList.remove("hidden");
                document.getElementById('videoPop').classList.add("block");
            }
        }

    </script>
    </body>

    </html>

@endsection
