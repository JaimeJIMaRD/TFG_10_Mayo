@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="pt-[10vh]">
            <h1>Crear Personaje</h1>
            <form action="{{ route('admin.personajes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label for="serie" class="form-label">Serie</label>
                    <input type="text" class="form-control" id="serie" name="serie" required>
                </div>

                <div class="mb-3">
                    <label for="actor_original" class="form-label">Actor Original</label>
                    <input type="text" class="form-control" id="actor_original" name="actor_original">
                </div>

                <div class="mb-3">
                    <label for="muestra">Muestra:</label>
                    <input type="file" name="muestra" id="muestra" class="form-control-file">
                </div>

                <div class="mb-3">
                    <label for="imagen_logo">Imagen del Logo:</label>
                    <input type="file" name="imagen_logo" id="imagen_logo" class="form-control-file">
                </div>

                <div class="mb-3">
                    <label for="imagen_fondo">Imagen de Fondo:</label>
                    <input type="file" name="imagen_fondo" id="imagen_fondo" class="form-control-file">
                </div>

                <div class="mb-3">
                    <label for="actor_id" class="form-label">Actor Principal:</label>
                    <select class="form-select" id="actor_id" name="actor_id" required>
                        <option value="">Seleccione el actor principal</option>
                        @foreach($actores as $actor)
                            <option value="{{ $actor->id }}">{{ $actor->nombre }} {{ $actor->apellido }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="otros-actores-container">
                    <!-- Contenedor para los campos de otros actores -->
                </div>

                <button type="button" id="agregar-otro-actor" class="bg-amber-500 mb-3">Agregar Otro Actor</button>

                <button type="submit" class="btn btn-primary">Crear Personaje</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('agregar-otro-actor').addEventListener('click', function() {
            var container = document.getElementById('otros-actores-container');
            var index = container.children.length;

            var actorDiv = document.createElement('div');
            actorDiv.className = 'mb-3';

            var labelActor = document.createElement('label');
            labelActor.setAttribute('for', 'otro_actor_nombre_' + index);
            labelActor.textContent = 'Otro Actor ' + (index + 1) + ':';
            actorDiv.appendChild(labelActor);

            var inputActor = document.createElement('input');
            inputActor.setAttribute('type', 'text');
            inputActor.setAttribute('name', 'otros_actores[' + index + '][nombre]');
            inputActor.setAttribute('class', 'form-control');
            inputActor.setAttribute('placeholder', 'Nombre del Actor');
            actorDiv.appendChild(inputActor);

            var labelContexto = document.createElement('label');
            labelContexto.setAttribute('for', 'otro_actor_contexto_' + index);
            labelContexto.textContent = 'Contexto:';
            actorDiv.appendChild(labelContexto);

            var inputContexto = document.createElement('input');
            inputContexto.setAttribute('type', 'text');
            inputContexto.setAttribute('name', 'otros_actores[' + index + '][contexto]');
            inputContexto.setAttribute('class', 'form-control');
            inputContexto.setAttribute('placeholder', 'Contexto');
            actorDiv.appendChild(inputContexto);

            container.appendChild(actorDiv);
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('formulario').addEventListener('submit', function(event) {
                var muestraInput = document.getElementById('muestra');
                var muestraFile = muestraInput.files[0];
                var allowedTypes = ['video/mp4'];

                if (muestraFile) {
                    if (!allowedTypes.includes(muestraFile.type)) {
                        event.preventDefault(); // Detener el envío del formulario
                        alert('El archivo de muestra debe ser de tipo MP4.');
                    }
                }
            });
        });

    </script>
@endsection
