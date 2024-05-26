@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="pt-[10vh]">
            <h1>Editar Personaje</h1>
            <form action="{{ route('admin.personajes.update', $personaje->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $personaje->nombre }}" required>
                </div>

                <div class="mb-3">
                    <label for="serie" class="form-label">Serie</label>
                    <input type="text" class="form-control" id="serie" name="serie" value="{{ $personaje->serie }}" required>
                </div>

                <div class="mb-3">
                    <label for="actor_original" class="form-label">Actor Original</label>
                    <input type="text" class="form-control" id="actor_original" value="{{ $personaje->actor_original }}" name="actor_original">
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
                    @foreach($personaje->otros_actores as $index => $otroActor)
                        <div class="mb-3">
                            <label for="otro_actor_nombre_{{ $index }}">Otro Actor {{ $index + 1 }}:</label>
                            <input type="text" name="otros_actores[{{ $index }}][nombre]" class="form-control" value="{{ $otroActor->nombre_actor }}">
                            <label for="otro_actor_contexto_{{ $index }}">Contexto:</label>
                            <input type="text" name="otros_actores[{{ $index }}][contexto]" class="form-control" value="{{ $otroActor->contexto }}">
                            <button type="button" class="btn btn-danger eliminar-actor" onclick="eliminarActor(this)">Eliminar</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="agregar-otro-actor" class="bg-amber-500 mb-3">Agregar Otro Actor</button>

                <button type="submit" class="btn btn-primary">Actualizar Personaje</button>
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

            var eliminarButton = document.createElement('button');
            eliminarButton.type = 'button';
            eliminarButton.className = 'btn btn-danger eliminar-actor';
            eliminarButton.textContent = 'Eliminar';
            eliminarButton.onclick = function() {
                container.removeChild(actorDiv);
            };
            actorDiv.appendChild(eliminarButton);

            container.appendChild(actorDiv);
        });

        function eliminarActor(button) {
            var container = document.getElementById('otros-actores-container');
            container.removeChild(button.parentNode);
        }
    </script>
@endsection
