@extends('layouts.public')
@section('content')

    <div class="flex bg-slate-500 z-10 w-full min-h-[100vh]" id="container">
        <div class="mt-[10vh] w-3/4 mx-auto bg-gray-100 p-5">
            <p>
                Subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo
                subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo
                subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo
                subtitulo subtitulo subtitulo subtitulo subtitulo subtitulo
            </p>
                <div class="mx-auto">
                    <div class="bg-gray-100 w-[65%] mx-auto my-7">
                        <div class="grid grid-cols-5 gap-6">
                            @foreach ($actor as $new_actor)
                                <a href="{{ route('actor.show', $new_actor->id) }}" class="text-decoration-none">
                                    <div class="w-full aspect-square bg-green-300 hover:scale-105 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{ $new_actor->imagen ? $new_actor->imagen : asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg') }});">
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
