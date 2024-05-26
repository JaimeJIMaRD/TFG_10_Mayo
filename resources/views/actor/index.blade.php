@extends('layouts.public')
@section('content')

    <div class="flex bg-gray-700 w-full min-h-[100vh]" id="container" >
        <div class="pt-[10vh] w-[87%] md:w-3/4 mx-auto bg-gray-50 p-5 shadow-md">
            <h1 class="text-6xl  mt-8 mb-2 text-center font-semibold">
                <img class="md:hidden block w-full px-3 mt-0.5" src="{{asset("imagenes/logo2.png")}}" alt="">
                <p class="invisible md:block hidden">
                Título
                </p>
            </h1>

            <p class="text-center md:w-2/3 w-full mx-auto mt-5">
                Doblapedia es una página web centrada en el reconocimiento de los actores de doblaje. En este espacio recogemos algunos de los actores de doblajes que obran en nuestro país y mostramos algunos de sus papeles más reconocidos.
            </p>
            <div class="flex">
                <div class="md:w-4/5 w-100 mx-auto md:mx-0">
                    @foreach ($actor as $key => $group)
                            <div class="w-[90%] mx-auto my-7">
                                <p class="text-4xl font-semibold pl-4 mb-2">{{ $key }}.</p>
                                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 border-t-4 rounded-sm px-3 pt-4 border-cyan-400">
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
                                            <div class="w-full aspect-square bg-cyan-200 transition-transform duration-100 ease-in-out hover:scale-105 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{  $imagen_foto  }});">
                                            </div>
                                            <p class="text-lg mt-1 text-center font-medium w-full">{{ $actor->nombre }} {{ $actor->apellido }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                    @endforeach
                </div>

                    <div class="w-[1/5] ml-auto md:block hidden">
                        <div class="ml-auto my-7">
                            <p class="text-md text-center w-3/4 font-semibold mx-auto pb-2 border-b-4 border-cyan-400">Nuevas Consultas</p>
                            <div class="ml-auto rounded-sm w-full px-3 pt-4">
                                @foreach ($ultimos as $ultimo)
                                    @php
                                        $file = \App\Models\File::find($ultimo->foto_id);
                                        if($file) {
                                            $imagen_foto = url($file->file_path);
                                        } else {
                                            $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                        }
                                    @endphp
                                    <a href="{{ route('actor.show', $ultimo->id) }}" class="text-decoration-none">
                                        <div class="transition-transform duration-100 ease-in-out hover:scale-105">
                                            <div class="w-2/3 mx-auto aspect-square bg-cyan-200 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{  $imagen_foto  }});">
                                            </div>
                                            <p class="text-xs mt-1 text-center font-medium mb-3 overflow-clip w-full" style="white-space: normal">{{ $ultimo->nombre }} {{ $ultimo->apellido }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                        <div class="ml-auto mt-9 mb-7">
                            <p class="text-md text-center w-3/4 font-semibold mx-auto pb-2 border-b-4 border-cyan-400">Consultas Actualizadas</p>
                            <div class="ml-auto rounded-sm w-full px-3 pt-4">
                                @foreach ($agregados as $agregado)
                                    @php
                                        $file = \App\Models\File::find($agregado->foto_id);
                                        if($file) {
                                            $imagen_foto = url($file->file_path);
                                        } else {
                                            $imagen_foto = asset('https://static.vecteezy.com/system/resources/thumbnails/005/129/844/small_2x/profile-user-icon-isolated-on-white-background-eps10-free-vector.jpg');
                                        }
                                    @endphp
                                    <a href="{{ route('actor.show', $agregado->id) }}" class="text-decoration-none">
                                        <div class="transition-transform duration-100 ease-in-out hover:scale-105">
                                            <div class="w-2/3 mx-auto aspect-square bg-cyan-200 rounded-lg" style="background-size: 100%; background-position: center; background-image: url({{  $imagen_foto  }});">
                                            </div>
                                            <p class="text-xs mt-1 text-center font-medium mb-3 overflow-clip w-full" style="white-space: normal">{{ $agregado->nombre }} {{ $agregado->apellido }}</p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        document.getElementById('doblapedia').classList.add('translate-y-[237%]');
        document.getElementById('doblapedia').classList.add('scale-[170%]');
        document.getElementById('doblapedia').classList.remove('hover:scale-[105%]');
        document.getElementById('doblapedia').classList.add('hover:scale-[175%]');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 0) {
                document.getElementById('doblapedia').classList.remove('translate-y-[237%]');
                document.getElementById('doblapedia').classList.remove('scale-[170%]');
                document.getElementById('doblapedia').classList.add('hover:scale-[105%]');
                document.getElementById('doblapedia').classList.remove('hover:scale-[175%]');

            }else{
                document.getElementById('doblapedia').classList.add('translate-y-[237%]');
                document.getElementById('doblapedia').classList.add('scale-[170%]')
                document.getElementById('doblapedia').classList.remove('hover:scale-[105%]');
                document.getElementById('doblapedia').classList.add('hover:scale-[175%]');

            }
        });
    </script>

    </body>
    </html>
@endsection
