@extends('layouts.public')

@section('content')
    <div class="flex bg-gray-700 w-full min-h-[100vh]" id="container" >
        <div class="pt-[10vh] w-[87%] md:w-3/4 mx-auto bg-gray-50 p-5 shadow-md relative">
            <div class="row justify-content-center">
                <div class="">
                    <div class="card">
                        <h1 class="text-2xl md:text-3xl mb-4 mt-7 mx-auto border-cyan-400 px-8 pb-1.5 border-b-4 font-semibold w-fit">Perfil de Usuario</h1>

                        <div class="w-2/3 mx-auto text-center md:flex justify-between pt-3">
                            <p><span class="font-medium">Nombre: </span> {{ Auth::user()->name }}</p>
                            <p class="mt-4 md:mt-0"><span class="font-medium">Correo electrónico: </span> {{ Auth::user()->email }}</p>

                        </div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="fixed right-3 bottom-3 mr-[12.5%] flex bg-gradient-to-tl px-2 py-1 rounded-md hover:scale-105 transition-transform duration-100 ease-in-out from-red-600 to-red-500" id="sesion">
                                <svg class="w-6 mr-2" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z"/></svg>
                                <p class="font-bold text-white">
                                    Cerrar sesión
                                </p>
                            </button>
                        </form>
                        <div class="w-full mt-8">
                            <div class="w-full md:w-2/3 mx-auto">
                                <h1 class="text-xl mb-4  text-center font-medium">Comentarios de {{ Auth::user()->name }}:</h1>
                                <div class="w-[90%] mx-auto">
                                @if(Auth::user()->comentarios->count() > 0)
                                    <div class="flex flex-col gap-4">
                                        @foreach(Auth::user()->comentarios as $comentario)
                                            @php
                                                $elenco = \App\Models\Elenco::find($comentario->elenco_id);
                                                $file = \App\Models\File::find($elenco->imagen_id);

                                                if($file) {
                                                    $imagen_foto = url($file->file_path);
                                                } else {
                                                    $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                                }
                                            @endphp

                                            <a href="{{ route('elenco.show', ['id' => $elenco->id]) }}" class="block w-full hover:no-underline">
                                                <div class="flex w-full gap-5 rounded-md border border-gray-300 p-4 shadow-sm hover:scale-[103%] transition-transform duration-100 ease-in-out hover:shadow-md">
                                                    <div class="w-1/6 md:block hidden rounded-full aspect-square bg-cyan-200" style="background-image: url('{{$imagen_foto}}'); background-size: 100%; background-position: center;"></div>
                                                    <div class="w-5/6">
                                                        <p class="font-medium line-clamp-1">{{$elenco->titulo}}</p>
                                                        <div>
                                                            <p class="text-sm md:text-md">{{ $comentario->contenido }}</p>
                                                            <p class="text-xs mt-2">{{ $comentario->created_at }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>

                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-center">No hay comentarios realizados por este usuario.</p>
                                @endif

                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
