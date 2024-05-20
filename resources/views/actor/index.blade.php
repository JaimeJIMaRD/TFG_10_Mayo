@extends('layouts.public')
@section('content')

<div class="flex bg-slate-500 z-10 w-full min-h-[100vh]" id="container">
    <div class="mt-[10vh] w-3/4 mx-auto bg-gray-100 p-5">
        <h1 class="text-6xl invisible mb-2 text-center font-semibold">Título</h1>

        <p class="text-center w-2/3 mx-auto mt-5">
            Doblapedia es una página web centrada en el reconocimiento de los actores de doblaje. En este espacio recogemos algunos de los actores de doblajes que obran en nuestro país y mostramos algunos de sus papeles más reconocidos.
        </p>
        @foreach ($actor as $key => $group)
            <div class="mx-auto">
                <div class="bg-gray-100 w-[72%] mx-auto my-7">
                    <p class="text-4xl font-semibold mb-2">{{ $key }}</p>
                    <div class="grid grid-cols-5 gap-6">
                        @foreach ($group as $actor)
                            @php
                                $file = \App\Models\File::find($actor->foto_id);
                                if($file) {
                                    $imagen_foto = url($file->file_path);
                                } else {
                                    $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                }
                            @endphp
                                <a href="{{ route('actor.show', $actor->id) }}" class="text-decoration-none">
                                    <div class="w-full aspect-square bg-green-300 transition-transform duration-100 ease-in-out hover:scale-105 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{  $imagen_foto  }});">
                                    </div>
                                    <p class="text-lg mt-1 text-center font-medium w-full">{{ $actor->nombre }} {{ $actor->apellido }}</p>
                                </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    document.getElementById('doblapedia').classList.add('translate-y-24');
    document.getElementById('doblapedia').classList.add('scale-[170%]');
    document.getElementById('doblapedia').classList.remove('hover:scale-[105%]');
    document.getElementById('doblapedia').classList.add('hover:scale-[175%]');

    window.addEventListener('scroll', function() {
        if (window.scrollY > 0) {
            document.getElementById('doblapedia').classList.remove('translate-y-24');
            document.getElementById('doblapedia').classList.remove('scale-[170%]');
            document.getElementById('doblapedia').classList.add('hover:scale-[105%]');
            document.getElementById('doblapedia').classList.remove('hover:scale-[175%]');

        }else{
            document.getElementById('doblapedia').classList.add('translate-y-24');
            document.getElementById('doblapedia').classList.add('scale-[170%]')
            document.getElementById('doblapedia').classList.remove('hover:scale-[105%]');
            document.getElementById('doblapedia').classList.add('hover:scale-[175%]');

        }
    });
</script>

</body>
</html>
@endsection
