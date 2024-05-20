@extends('layouts.public')

@section('content')
    <div class="container">
        <div class="pt-[10vh]">
            <h1>Crear Actor</h1>
            <form action="{{ route('admin.actores.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" id="estado" name="estado" required>
                        <option value="0">Activo</option>
                        <option value="1">Retirado</option>
                        <option value="2">En memoria</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="foto">Foto:</label>
                    <input type="file" name="foto" id="foto" class="form-control-file">
                </div>

                <div id="actores-recurrentes-container">
                    <!-- Contenedor para los campos de actores recurrentes -->
                </div>

                <button type="button" id="agregar-actor-recurrente" class="bg-amber-500 mb-3">Agregar Actor Recurrente</button>

                <div class="mb-3">
                    <label for="eldoblaje" class="form-label">ElDoblaje</label>
                    <input type="text" class="form-control" id="eldoblaje" name="eldoblaje">
                </div>

                <div class="mb-3">
                    <label for="twitter" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="twitter" name="twitter">
                </div>

                <div class="mb-3">
                    <label for="ciudad" class="form-label">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                </div>

                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control" id="instagram" name="instagram">
                </div>


                <button type="submit" class="btn btn-primary">Crear Actor</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('agregar-actor-recurrente').addEventListener('click', function() {
            var container = document.getElementById('actores-recurrentes-container');
            var index = container.children.length;

            var actorDiv = document.createElement('div');
            actorDiv.className = 'mb-3';

            var label = document.createElement('label');
            label.setAttribute('for', 'actor_recurrente_' + index);
            label.textContent = 'Actor Recurrente ' + (index + 1) + ':';
            actorDiv.appendChild(label);

            var input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'actores_recurrentes[]');
            input.setAttribute('class', 'form-control');
            actorDiv.appendChild(input);

            container.appendChild(actorDiv);
        });
    </script>
@endsection
