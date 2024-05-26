@extends('layouts.public')
@section('content')
    <div class="md:flex z-10 pt-[10vh]" id="container"  style="background: linear-gradient(to right, rgba(55, 65, 81, 1) 7.5%, rgba(249, 250, 251, 1) 7.5%, rgba(249, 250, 251, 1) 93.5%, rgba(55, 65, 81, 1) 93.5%);">
        <div
            id="persona"
            class="panel flex justify-center md:w-[35vw] h-[72vh] md:h-[90vh] z-10"
        >
            <div
                class="h-[89%] w-2/3 from-red-600 to-red-500 bg-gradient-to-br shadow-md"
                style="clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 90%, 0 100%)"
            >
                @php
                    $file = \App\Models\File::find($actor->foto_id);
                    if($file) {
                        $imagen_foto = url($file->file_path);
                    } else {
                        $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                    }
                @endphp
                <div
                    class="w-[65%] aspect-square rounded-md bg-slate-100 mx-auto mt-7"
                    style="background-size: 100%; background-position: center; background-image: url({{ $imagen_foto }});"
                ></div>
                <div class="rounded-md w-fit px-4 mx-auto text-xl font-semibold mt-3">
                    {{ $actor->nombre }} {{ $actor->apellido }}
                </div>

                <div class="text-center mt-2 mx-auto">
                @if ($actor->estado == "0")
                    <p>
                        En activo
                    </p>

                @elseif ($actor->estado == "1")
                    <p>
                        Retirado
                    </p>
                @elseif ($actor->estado == "2")
                    <p>
                        En memoria
                    </p>
                @endif
                </div>
                    @if (!empty($actor->actores_recurrentes))
                           <div class="mt-3">
                    <div class="w-fit px-4 mx-auto mt-7 text-white">Voz habitual de:</div>
                    <div class="rounded-md bg-white mx-auto mt-2 w-[90%]">
                        <div class="flex justify-between">
                            <a
                                id="flecha_recurrentes_1"
                                class="select-none text-lg font-bold hover:bg-[rgba(0,0,0,0.7)] px-2 w-auto text-gray-500 cursor-pointer rounded-l-md transition ease-linear"
                                onclick="plusSlides(-1)"
                            >&#10094;</a
                            >
                            <div class="mx-4 carousel-container" id="ContenedorCarruselRecurrente">
                                @foreach($actor->actores_recurrentes as $actor_recurrente)
                                    <div class="Containers aparecer">{{ $actor_recurrente }}</div>
                                @endforeach
                            </div>
                            <a
                                id="flecha_recurrentes_2"
                                class="select-none text-lg font-bold w-auto hover:bg-[rgba(0,0,0,0.7)] px-2 text-gray-500 cursor-pointer rounded-r-md transition ease-linear"
                                onclick="plusSlides(1)"
                            >&#10095;</a
                            >
                        </div>
                    </div>
                           </div>
                @endif
            </div>

            <div class="flex flex-col ml-3">
                @if (!empty($actor->eldoblaje))
                    <a href="{{$actor->eldoblaje}}" target="”_blank”">
                        <svg
                            class="w-5 mt-3 opacity-50 hover:opacity-100"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"
                        >
                            <path
                                d="M96 96V256c0 53 43 96 96 96s96-43 96-96H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80V192H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80V128H208c-8.8 0-16-7.2-16-16s7.2-16 16-16h80c0-53-43-96-96-96S96 43 96 96zM320 240v16c0 70.7-57.3 128-128 128s-128-57.3-128-128V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v40c0 89.1 66.2 162.7 152 174.4V464H120c-13.3 0-24 10.7-24 24s10.7 24 24 24h72 72c13.3 0 24-10.7 24-24s-10.7-24-24-24H216V430.4c85.8-11.7 152-85.3 152-174.4V216c0-13.3-10.7-24-24-24s-24 10.7-24 24v24z"
                            />
                        </svg>
                    </a>
                @endif @if (!empty($actor->ciudad))
                    <div class="flex items-center mt-3 group">
                        <svg
                            class="w-5 opacity-50 hover:opacity-100"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 384 512"
                        >
                            <path
                                d="M48 0C21.5 0 0 21.5 0 48V464c0 26.5 21.5 48 48 48h96V432c0-26.5 21.5-48 48-48s48 21.5 48 48v80h96c26.5 0 48-21.5 48-48V48c0-26.5-21.5-48-48-48H48zM64 240c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V240zm112-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V240zM80 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16zm80 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H176c-8.8 0-16-7.2-16-16V112zM272 96h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H272c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16z"
                            />
                        </svg>
                        <div class="bg-white px-2 py-1 rounded-xl border border-gray-300 absolute -ml-[75px] md:ml-7 aparecer2">
                            {{ $actor->ciudad }}
                        </div>
                    </div>
                @endif @if (!empty($actor->twitter))
                    <a href="{{$actor->twitter}}" target="”_blank”">
                        <svg
                            class="w-5 mt-3 opacity-50 hover:opacity-100"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                        >
                            <path
                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM351.3 199.3v0c0 86.7-66 186.6-186.6 186.6c-37.2 0-71.7-10.8-100.7-29.4c5.3 .6 10.4 .8 15.8 .8c30.7 0 58.9-10.4 81.4-28c-28.8-.6-53-19.5-61.3-45.5c10.1 1.5 19.2 1.5 29.6-1.2c-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3c-9-6-16.4-14.1-21.5-23.6s-7.8-20.2-7.7-31c0-12.2 3.2-23.4 8.9-33.1c32.3 39.8 80.8 65.8 135.2 68.6c-9.3-44.5 24-80.6 64-80.6c18.9 0 35.9 7.9 47.9 20.7c14.8-2.8 29-8.3 41.6-15.8c-4.9 15.2-15.2 28-28.8 36.1c13.2-1.4 26-5.1 37.8-10.2c-8.9 13.1-20.1 24.7-32.9 34c.2 2.8 .2 5.7 .2 8.5z"
                            />
                        </svg>
                    </a>
                @endif @if (!empty($actor->instagram))
                    <a href="{{$actor->instagram}}" target="”_blank”">
                        <svg
                            class="w-5 mt-3 opacity-50 hover:opacity-100 "
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"

                        >
                            <path
                                d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"
                            />
                        </svg>
                    </a>
                @endif @if (!empty($actor->cumpleanos))
                        <div class="flex items-center mt-3 group">
                            <svg class="w-5 opacity-50 hover:opacity-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M86.4 5.5L61.8 47.6C58 54.1 56 61.6 56 69.2V72c0 22.1 17.9 40 40 40s40-17.9 40-40V69.2c0-7.6-2-15-5.8-21.6L105.6 5.5C103.6 2.1 100 0 96 0s-7.6 2.1-9.6 5.5zm128 0L189.8 47.6c-3.8 6.5-5.8 14-5.8 21.6V72c0 22.1 17.9 40 40 40s40-17.9 40-40V69.2c0-7.6-2-15-5.8-21.6L233.6 5.5C231.6 2.1 228 0 224 0s-7.6 2.1-9.6 5.5zM317.8 47.6c-3.8 6.5-5.8 14-5.8 21.6V72c0 22.1 17.9 40 40 40s40-17.9 40-40V69.2c0-7.6-2-15-5.8-21.6L361.6 5.5C359.6 2.1 356 0 352 0s-7.6 2.1-9.6 5.5L317.8 47.6zM128 176c0-17.7-14.3-32-32-32s-32 14.3-32 32v48c-35.3 0-64 28.7-64 64v71c8.3 5.2 18.1 9 28.8 9c13.5 0 27.2-6.1 38.4-13.4c5.4-3.5 9.9-7.1 13-9.7c1.5-1.3 2.7-2.4 3.5-3.1c.4-.4 .7-.6 .8-.8l.1-.1 0 0 0 0s0 0 0 0s0 0 0 0c3.1-3.2 7.4-4.9 11.9-4.8s8.6 2.1 11.6 5.4l0 0 0 0 .1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c3-3.5 7.4-5.4 12-5.4s9 2 12 5.4l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c2.9-3.4 7.1-5.3 11.6-5.4s8.7 1.6 11.9 4.8l0 0 0 0 0 0 .1 .1c.2 .2 .4 .4 .8 .8c.8 .7 1.9 1.8 3.5 3.1c3.1 2.6 7.5 6.2 13 9.7c11.2 7.3 24.9 13.4 38.4 13.4c10.7 0 20.5-3.9 28.8-9V288c0-35.3-28.7-64-64-64V176c0-17.7-14.3-32-32-32s-32 14.3-32 32v48H256V176c0-17.7-14.3-32-32-32s-32 14.3-32 32v48H128V176zM448 394.6c-8.5 3.3-18.2 5.4-28.8 5.4c-22.5 0-42.4-9.9-55.8-18.6c-4.1-2.7-7.8-5.4-10.9-7.8c-2.8 2.4-6.1 5-9.8 7.5C329.8 390 310.6 400 288 400s-41.8-10-54.6-18.9c-3.5-2.4-6.7-4.9-9.4-7.2c-2.7 2.3-5.9 4.7-9.4 7.2C201.8 390 182.6 400 160 400s-41.8-10-54.6-18.9c-3.7-2.6-7-5.2-9.8-7.5c-3.1 2.4-6.8 5.1-10.9 7.8C71.2 390.1 51.3 400 28.8 400c-10.6 0-20.3-2.2-28.8-5.4V480c0 17.7 14.3 32 32 32H416c17.7 0 32-14.3 32-32V394.6z"/></svg>
                            <div class="bg-white border border-gray-300 px-2 py-1 rounded-xl absolute -ml-[75px] md:ml-7 aparecer2">
                                    <?php
                                    $fecha = new DateTime($actor->cumpleanos);
                                    echo $fecha->format('d/m/Y');
                                    ?>
                            </div>
                        </div>
                    @endif

            </div>
        </div>

        <div
            id="personajes"
            class="panel md:w-[65vw] md:h-[90vh] flex flex-col justify-between"
        >
            <div class="flex justify-center w-full">
                @php
                    if(!empty($personajes)){$chunks = $personajes->chunk(16);}
                @endphp

                @foreach ($chunks as $index => $chunk)
                    <div class="grid md:mx-0 mx-8 grid-cols-3 md:grid-cols-5 rounded-2xl mt-3 p-5 w-fit text-center" id="pag{{ $index + 1 }}">
                        @foreach ($chunk as $personaje)
                            @php
                                $file = \App\Models\File::find($personaje->imagen_logo_id);
                                if($file) {
                                    $imagen_logo_url = url($file->file_path);
                                } else {
                                    $imagen_logo_url = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                }

                                $filemon = \App\Models\File::find($personaje->imagen_fondo_id);
                                if($filemon) {
                                    $imagen_fondo_url = url($filemon->file_path);
                                } else {
                                    $imagen_fondo_url = asset('https://static.vecteezy.com/system/resources/thumbnails/005/239/973/small/cartoon-white-brick-wall-texture-illustration-vector.jpg');
                                }

                                $filemono = \App\Models\File::find($personaje->muestra_id);
                                if($filemono) {
                                    $muestra = url($filemono->file_path);
                                } else {
                                    $muestra = null;
                                }
                            @endphp

                            <div class="bg-gray-400 w-20 md:w-24 aspect-square m-1.5 hover:scale-105 transition-transform duration-100 ease-in-out rounded-sm casilla{{ $loop->parent->index * 16 + $loop->index + 1 }}"
                                 onclick="activar('casilla{{ $loop->parent->index * 16 + $loop->index + 1 }}')"
                                 data-nombre="{{ $personaje->nombre }}"
                                 data-serie="{{ $personaje->serie }}"
                                 data-actor-original="{{ $personaje->actor_original }}"
                                 data-imagen-fondo="{{ $imagen_fondo_url  }}"
                                 data-muestra="{{ $muestra  }}"
                                 data-otros-actores="{{ json_encode($personaje->otros_actores) }}"
                                 style="background-size: 100%; background-position: center; background-image: url({{ $imagen_logo_url }});"
                            >
                            </div>

                        @endforeach


                    </div>
                @endforeach

                @if ($chunks->isEmpty())
                    <div class="text-sm md:text-lg mt-24">
                        No se encontraron personajes para este actor.
                    </div>
                @endif
            </div>

            <div id="pagination" class="flex justify-around w-[15] mx-auto mb-6 select-none">
                @foreach ($chunks as $index => $chunk)
                    <div
                        class="h-7 w-7 mx-1 rounded-md bg-stone-400 flex justify-center align-middle pag{{ $index + 1 }} cursor-pointer"
                        onclick="pagination('pag{{ $index + 1 }}')"
                    >
                        {{ $index + 1 }}
                    </div>
                @endforeach
            </div>
        </div>

        <div
            id="etiqueta"
            class="absolute h-full from-red-600 to-red-500 bg-gradient-to-br z-40 shadow-md"
            style="
          clip-path: polygon(0 0, 100% 0, 100% 89%, 50% 65%, 0 89%);
          width: 25vw;
          height: 20vh;
          top: -20vh;
          left: 2vh;
        "
        ></div>
        <div
            id="consulta"
            class="panel md:-right-[35vw] hidden -right-[85vw] bg-gray-600 mt-[12vh] top-0 border-t-2 border-gray-700 border-b-2 border-l-2 absolute w-[85vw] md:w-[35vw] h-fit rounded-l-lg flex-col self-center"
            style="overflow: hidden;"
        >
            <div
                class="w-[98%] aspect-video bg-slate-300 mx-auto rounded-md mt-1.5 flex-shrink-0" id="imagenFondo"
                style="background-size: 100%; background-position: center;"
            ></div>
            <p
                class="text-2xl text-center font-semibold mx-auto text-gray-50 mt-1.5"
                id="nombrePersonaje"
            ></p>
            <p class="text-sm mx-auto text-center text-gray-50 mt-1" id="seriePersonaje"></p>
            <div class="flex justify-between text-base text-white px-7 mt-9">
                <p class="font-medium">Actor original:</p>
                <p id="actorOriginal"></p>
            </div>

            <div class="flex justify-between text-base text-gray-50 px-7 mt-4" id="ocultarDoblaje">
                <p id="otrosDoblajes" class="font-medium">Otros doblajes:</p>

                <button id="flecha_otros_1"
                        class="select-none text-lg font-bold hover:bg-[rgba(0,0,0,0.7)] px-2 text-gray-500 cursor-pointer rounded-l-md transition ease-linear"
                        onclick="plusSlidesOtrosDoblajes(-1)">&#10094;
                </button>

                <div id="ContenedorCarruselOtros" class="carousel-container-otros-doblajes my-auto">
                </div>

                <button id="flecha_otros_2"
                        class="select-none text-lg font-bold hover:bg-[rgba(0,0,0,0.7)] px-2 text-gray-500 cursor-pointer rounded-r-md transition ease-linear"
                        onclick="plusSlidesOtrosDoblajes(1)">&#10095;
                </button>
            </div>

            <p class="uppercase text-center text-white font-bold text-2xl mt-5 pb-3 cursor-pointer select-none" id="muestra">
                muestra
            </p>

        </div>
        <button id="qlo" class="absolute invisible" onclick="nada()">

        </button>

        <dialog id="favDialog" class="rounded-3xl">
            <div class="flex justify-end p-4">
                <button id="cancel" type="reset" class="text-[#AEB0AE] select-none">
                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                </button>
            </div>
            <form method="dialog" class="">
                <section class="px-5 pb-5 h-fit">
                        <video class="aspect-video h-[60vh] hidden" controls id="videoPop">
                        </video>
                        <audio class="hidden mx-auto" controls id="audioPop"></audio>
                </section>
            </form>
        </dialog>
    </div>
    <script>
        let personajess = document.getElementById("personajes");
        let personaa = document.getElementById("persona");
        let consultaa = document.getElementById("consulta");
        let etiquetaa = document.getElementById("etiqueta");
        let selec = 0;
        let pag1 = document.getElementById("pag1");
        let pag2 = document.getElementById("pag2");
        let muestraletra = document.getElementById("muestra");
        let muestravalor = false;
        let vari = 0;
        function posicion1() {
            personaa.classList.add("arriba");
            if (window.matchMedia('(min-width: 768px)').matches) {
                personajess.classList.add("slide-out-left");
            }
            consultaa.classList.add("slide-out-left");
            etiquetaa.classList.add("abajo");
            setTimeout(() => {
                nada()
            }, 1301);

        }

        function muestractiva() {
            if (muestravalor == false) {
                muestravalor = true;
                muestraletra.classList.remove("text-slate-600");
                muestraletra.classList.add("text-slate-300");
                muestraletra.classList.remove("font-bold");
                muestraletra.classList.add("font-extrabold");
                muestraletra.classList.add("hover:text-slate-100");
                muestraletra.classList.remove("cursor-default");
                muestraletra.classList.add("cursor-pointer");
            } else if (muestravalor == true) {
                muestravalor = false;
                muestraletra.classList.remove("text-slate-300");
                muestraletra.classList.remove("hover:text-slate-100");
                muestraletra.classList.add("font-bold");
                muestraletra.classList.remove("font-extrabold");
                muestraletra.classList.add("text-slate-600");
                muestraletra.classList.remove("cursor-pointer");
                muestraletra.classList.add("cursor-default");
            }
        }

        function pagination(id) {
            let activo = document.getElementsByClassName("bg-stone-400");
            let desactivo = document.getElementsByClassName(id);
            let pag_activo = document.getElementsByClassName("grid");
            let pag_activar = document.getElementById(id);
            pag_activo[0].classList.add("hidden");
            pag_activo[0].classList.remove("grid");
            pag_activar.classList.add("grid");
            pag_activar.classList.remove("hidden");

            activo[0].classList.add("scale-75");
            activo[0].classList.remove("scale-110");
            activo[0].classList.add("cursor-pointer");
            activo[0].classList.remove("cursor-default");

            activo[0].classList.add("bg-stone-500");
            activo[0].classList.remove("bg-stone-400");

            desactivo[0].classList.add("scale-110");
            desactivo[0].classList.remove("scale-75");
            desactivo[0].classList.remove("cursor-pointer");
            desactivo[0].classList.add("cursor-default");
            desactivo[0].classList.add("bg-stone-400");
            desactivo[0].classList.remove("bg-stone-500");
        }



        etiquetaa.addEventListener("click", () => {
            etiquetaa.classList.remove("abajo");
            etiquetaa.classList.add("abajont");
            setTimeout(() => {
                consultaa.classList.add("hidden");
                consultaa.classList.remove("slide-out-left");
                consultaa.classList.add("slide-out-leftnt");
                if (window.matchMedia('(min-width: 768px)').matches) {
                    personajess.classList.remove("slide-out-left");
                    personajess.classList.add("slide-out-leftnt");
                }
            }, 800);

            setTimeout(() => {
                personaa.classList.remove("arriba");
                personaa.classList.add("arribant");
                a_desactivar = document.getElementsByClassName("border-amber-400");
                a_desactivar[0].classList.remove("scale-110");
                a_desactivar[0].classList.add("hover:scale-105");
                a_desactivar[0].classList.remove("border-4");
                a_desactivar[0].classList.remove("border-amber-400");
                selec = 0;
            }, 1100);
            setTimeout(() => {
                etiquetaa.classList.remove("abajont");
                consultaa.classList.remove("slide-out-leftnt");
                consultaa.style.display = 'none' ;
                personajess.classList.remove("slide-out-leftnt");
                personaa.classList.remove("arribant");
            }, 2000);
        });
        function reversePagination() {
            let paginationDiv = document.getElementById('pagination');

            let cantidadHijos = paginationDiv.children.length;

            if(cantidadHijos===1){
                paginationDiv.classList.add('invisible');
            }
            for (let i = 1; i <= cantidadHijos; i++) {
                pagination('pag'+i);
            }
            pagination('pag1');
        }

        document.addEventListener('DOMContentLoaded', function() {
            reversePagination();
        });
        function activar(puesto) {
            var a_activar = document.getElementsByClassName(puesto);
            if (selec === 0) {
                a_activar[0].classList.add("scale-110");
                a_activar[0].classList.remove("hover:scale-105");
                a_activar[0].classList.add("border-4");
                a_activar[0].classList.add("border-amber-400");
                selec = 1;
                posicion1();
            } else {
                var a_desactivar = document.getElementsByClassName("border-amber-400");
                a_desactivar[0].classList.remove("scale-110");
                a_desactivar[0].classList.remove("border-4");
                a_desactivar[0].classList.add("hover:scale-105");
                a_desactivar[0].classList.remove("border-amber-400");
                a_activar[0].classList.remove("hover:scale-105");
                a_activar[0].classList.add("scale-110");
                a_activar[0].classList.add("border-4");
                a_activar[0].classList.add("border-amber-400");
                selec = 1;
            }
            var casilla = document.querySelector('.' + puesto);

            var nombre = casilla.getAttribute('data-nombre');
            var serie = casilla.getAttribute('data-serie');
            var actorOriginal = casilla.getAttribute('data-actor-original');
            var imagenFondo = casilla.getAttribute('data-imagen-fondo');
            var otrosActoresJson = casilla.getAttribute('data-otros-actores');
            var muestra = casilla.getAttribute('data-muestra');
            var otrosActores = JSON.parse(otrosActoresJson);

            document.getElementById("nombrePersonaje").innerText = nombre;
            document.getElementById("seriePersonaje").innerText = serie;

            if (actorOriginal === '') {
                actorOriginal = 'Desconocido'
            }

            document.getElementById("actorOriginal").innerText = actorOriginal;
            document.getElementById("imagenFondo").style.backgroundImage = "url(" + imagenFondo + ")";
            if(muestra){
                var extension = muestra.split('.').pop();
                document.getElementById('muestra').classList.remove("invisible");

                if (extension==='mp4'){
                    document.getElementById("videoPop").setAttribute('src', muestra);
                    document.getElementById('videoPop').classList.remove("hidden");
                    document.getElementById('audioPop').classList.add("hidden");
                }else if (extension==='mp3'){
                    document.getElementById("audioPop").setAttribute('src', muestra);
                    document.getElementById('audioPop').classList.remove("hidden");
                    document.getElementById('videoPop').classList.add("hidden");
                }
            } else{
                document.getElementById('muestra').classList.add("invisible");
                document.getElementById('videoPop').classList.add("hidden");
                document.getElementById('audioPop').classList.add("hidden");
            }
            document.getElementById("consulta").classList.remove("hidden");
            var contenedorCarruselOtrosDoblajes = document.querySelector('.carousel-container-otros-doblajes');
            contenedorCarruselOtrosDoblajes.innerHTML = '';

            if (otrosActores.length === 0) {
                document.getElementById('ocultarDoblaje').classList.add("invisible");
            } else {
                document.getElementById('ocultarDoblaje').classList.remove("invisible");

                otrosActores.forEach(function (actor) {
                    var slide = document.createElement('div');
                    slide.className = 'carousel-slide-otros-doblajes my-auto';
                    if (actor.actor_id) {
                        var actor_id = actor.actor_id;
                        if (!actor.contexto) {
                            slide.innerHTML = '<a href="/actor/' + actor_id + '"><p class="hover:underline line-clamp-1">' + actor.nombre_actor + '</p></a>';
                        } else {
                            slide.innerHTML = `
                <a href="/actor/${actor_id}">
                    <div class="flex">
                        <p class="hover:underline line-clamp-1 my-auto">${actor.nombre_actor}</p>
                        <div class="relative group select-none cursor-default">
                            <p class="absolute bg-white aparecer2 text-black -bottom-full -left-40 mb-full rounded-md px-2 py-1 shadow-xl w-40">
                                ${actor.contexto}
                            </p>
                            <p class="ml-2 font-bold">🛈</p>
                        </div>
                    </div>
                </a>
            `;
                        }
                    } else {
                        if (!actor.contexto) {
                            slide.innerHTML = '<p class="line-clamp-1">' + actor.nombre_actor + '</p>';
                        } else {
                            slide.innerHTML = `
                <div class="flex">
                    <p class="line-clamp-1">${actor.nombre_actor}</p>
                    <div class="relative group select-none cursor-default">
                        <p class="absolute bg-white aparecer2 text-black -bottom-full -left-40 mb-full rounded-md px-2 py-1 shadow-xl w-40">
                            ${actor.contexto}
                        </p>
                        <p class="ml-2 font-bold">🛈</p>
                    </div>
                </div>
            `;
                        }
                    }
                    contenedorCarruselOtrosDoblajes.appendChild(slide);
                });

                if(contenedorCarruselOtrosDoblajes.children.length>1){
                    plusSlidesOtrosDoblajes(0);
                }
                ocultar_flechas_2();


            }
            document.getElementById("consulta").style.display = "block";
        }


        var slidePosition = 1;
        SlideShow(slidePosition);

        function ocultar_flechas() {
            var contenedor = document.getElementById('ContenedorCarruselRecurrente');
            if (contenedor.childElementCount == 1) {
                document.getElementById('flecha_recurrentes_1').classList.add('invisible');
                document.getElementById('flecha_recurrentes_2').classList.add('invisible');
            }
        }

        function ocultar_flechas_2() {
            var contenedor = document.getElementById('ContenedorCarruselOtros');
            if (contenedor.childElementCount == 1) {
                document.getElementById('flecha_otros_1').classList.add('hidden');
                document.getElementById('flecha_otros_2').classList.add('hidden');
            } else {
                document.getElementById('flecha_otros_1').classList.remove('hidden');
                document.getElementById('flecha_otros_2').classList.remove('hidden');
            }
        }

        ocultar_flechas();

        function plusSlides(n) {
            SlideShow((slidePosition += n));
        }

        function currentSlide(n) {
            SlideShow((slidePosition = n));
        }

        function SlideShow(n) {
            var i;
            var slides = document.getElementsByClassName("Containers");
            if (n > slides.length) {
                slidePosition = 1;
            }
            if (n < 1) {
                slidePosition = slides.length;
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slidePosition - 1].style.display = "block";
        }


        (function () {
            var updateButton = document.getElementById("muestra");
            var cancelButton = document.getElementById("cancel");
            var favDialog = document.getElementById("favDialog");

            updateButton.addEventListener("click", function () {
                    favDialog.showModal();
            });

            cancelButton.addEventListener("click", function () {
                favDialog.close();
                document.getElementById('videoPop').pause();
                document.getElementById('audioPop').pause();
            });
        })();

        var slidePositionOtrosDoblajes = 1;
        SlideShowOtrosDoblajes(slidePositionOtrosDoblajes);

        function plusSlidesOtrosDoblajes(n) {
            SlideShowOtrosDoblajes((slidePositionOtrosDoblajes += n));
        }

        function SlideShowOtrosDoblajes(n) {
            var i;
            var slidesOtrosDoblajes = document.querySelectorAll(".carousel-container-otros-doblajes .carousel-slide-otros-doblajes");
            if (n > slidesOtrosDoblajes.length) {
                slidePositionOtrosDoblajes = 1;
            }
            if (n < 1) {
                slidePositionOtrosDoblajes = slidesOtrosDoblajes.length;
            }
            for (i = 0; i < slidesOtrosDoblajes.length; i++) {
                slidesOtrosDoblajes[i].style.display = "none";
            }
            slidesOtrosDoblajes[slidePositionOtrosDoblajes - 1].style.display = "block";
        }

    function nada(){
        var palabra = vari + 'px';
        document.getElementById('qlo').style.left= palabra;
        vari++;
    }

    </script>
    </body>
    </html>
@endsection
