@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="pt-[10vh]">
            <h1>Editar Actor</h1>
            <form action="{{ route('admin.actores.update', $actor->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $actor->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $actor->apellido }}" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="0" {{ $actor->estado == 0 ? 'selected' : '' }}>Activo</option>
                        <option value="1" {{ $actor->estado == 1 ? 'selected' : '' }}>Retirado</option>
                        <option value="2" {{ $actor->estado == 2 ? 'selected' : '' }}>En memoria</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" class="form-control-file">
                </div>

                <div id="actores-recurrentes-container">
                    @foreach(json_decode($actor->actores_recurrentes, true) ?? [] as $index => $actor_recurrente)
                        <div class="mb-3 actor-recurrente">
                            <label for="actor_recurrente_{{ $index }}">Actor Recurrente {{ $index + 1 }}:</label>
                            <input type="text" name="actores_recurrentes[]" class="form-control" value="{{ $actor_recurrente }}">
                            <button type="button" class="eliminar-actor-recurrente bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="agregar-actor-recurrente" class="bg-amber-500 mb-3">Agregar Actor Recurrente</button>

                <div class="mb-3">
                    <label for="eldoblaje" class="form-label">ElDoblaje</label>
                    <input type="text" class="form-control" id="eldoblaje" name="eldoblaje" value="{{ $actor->eldoblaje }}">
                </div>

                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $actor->twitter }}">
                </div>

                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $actor->ciudad }}">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $actor->instagram }}">
                </div>

                <div class="mb-3">
                    <label for="cumpleanos" class="form-label">Cumpleaños</label>
                    <input type="date" class="form-control" id="cumpleanos" name="cumpleanos" value="{{ $actor->cumpleanos }}">
                </div>


                <button type="submit" class="btn btn-primary">Actualizar Actor</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('agregar-actor-recurrente').addEventListener('click', function() {
            var container = document.getElementById('actores-recurrentes-container');
            var index = container.children.length;

            var actorDiv = document.createElement('div');
            actorDiv.className = 'mb-3 actor-recurrente';

            var label = document.createElement('label');
            label.setAttribute('for', 'actor_recurrente_' + index);
            label.textContent = 'Actor Recurrente ' + (index + 1) + ':';
            actorDiv.appendChild(label);

            var input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'actores_recurrentes[]');
            input.setAttribute('class', 'form-control');
            actorDiv.appendChild(input);

            var eliminarButton = document.createElement('button');
            eliminarButton.textContent = 'Eliminar';
            eliminarButton.type = 'button';
            eliminarButton.className = 'eliminar-actor-recurrente bg-red-500 text-white px-2 py-1 rounded';
            eliminarButton.addEventListener('click', function() {
                container.removeChild(actorDiv);
            });
            actorDiv.appendChild(eliminarButton);

            container.appendChild(actorDiv);
        });

        document.querySelectorAll('.eliminar-actor-recurrente').forEach(function(button) {
            button.addEventListener('click', function() {
                var actorDiv = this.closest('.actor-recurrente');
                actorDiv.parentElement.removeChild(actorDiv);
            });
        });
    </script>
@endsection
