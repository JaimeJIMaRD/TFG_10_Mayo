@extends('layouts.public')
@section('content')

    <div class="flex bg-gray-700 w-full min-h-[100vh]" id="container" >
        <div class="pt-[10vh] w-[87%] md:w-3/4 mx-auto bg-gray-50 p-5 shadow-md">
            <h1 class="mt-4 md:text-start text-center">Resultados de búsqueda para "{{ $query }}"</h1>
                <div class="mx-auto">
                    <div class="md:w-[78%] mx-auto my-7">
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 rounded-sm px-3 pt-4 border-cyan-400">
                            @foreach ($actor as $new_actor)
                                @php
                                    $file = \App\Models\File::find($new_actor->foto_id);
                                    if($file) {
                                        $imagen_foto = url($file->file_path);
                                    } else {
                                        $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                    }
                                @endphp
                                <a href="{{ route('actor.show', $new_actor->id) }}" class="text-decoration-none">
                                    <div class="w-full aspect-square bg-cyan-200 transition-transform duration-100 ease-in-out hover:scale-105 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{  $imagen_foto  }});">
                                    </div>
                                    <p class="text-lg mt-1 text-center font-medium w-full">{{ $new_actor->nombre }} {{ $new_actor->apellido }}</p>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
        </div>
    </div>
    </body>
    </html>
@endsection
