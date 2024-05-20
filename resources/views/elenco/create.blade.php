@extends('layouts.public')
@section('content')
<form class="pt-[10vh]" action="{{ route('guardar_elenco') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nombre_elenco">Nombre del Elenco:</label>
    <input type="text" name="nombre_elenco">

    <label for="descripcion_elenco">Descripción del Elenco:</label>
    <textarea name="descripcion_elenco"></textarea>

    <label for="imagen_elenco">Imagen del Elenco:</label>
    <input type="file" name="imagen_elenco">

    <h2>Papeles:</h2>
    <div id="papeles-container">
    </div>

    <button type="button" id="agregar-papel">Agregar Papel</button>

    <button type="submit">Guardar</button>
</form>

<script>
    document.getElementById('agregar-papel').addEventListener('click', function() {
        var container = document.getElementById('papeles-container');
        var index = container.children.length;

        var papelDiv = document.createElement('div');
        papelDiv.className = 'papel';

        var papelTitle = document.createElement('h3');
        papelTitle.textContent = 'Papel ' + (index + 1) + ':';
        papelDiv.appendChild(papelTitle);

        var personajeLabel = document.createElement('label');
        personajeLabel.setAttribute('for', 'personaje_' + index);
        personajeLabel.textContent = 'Personaje:';
        papelDiv.appendChild(personajeLabel);

        var personajeInput = document.createElement('input');
        personajeInput.setAttribute('type', 'text');
        personajeInput.setAttribute('name', 'papeles[' + index + '][personaje]');
        papelDiv.appendChild(personajeInput);

        var imagenLabel = document.createElement('label');
        imagenLabel.setAttribute('for', 'imagen_' + index);
        imagenLabel.textContent = 'Imagen:';
        papelDiv.appendChild(imagenLabel);

        var imagenInput = document.createElement('input');
        imagenInput.setAttribute('type', 'file');
        imagenInput.setAttribute('name', 'papeles[' + index + '][imagen]');
        papelDiv.appendChild(imagenInput);

        var actorLabel = document.createElement('label');
        actorLabel.setAttribute('for', 'actor_' + index);
        actorLabel.textContent = 'Actor:';
        papelDiv.appendChild(actorLabel);

        var actorInput = document.createElement('input');
        actorInput.setAttribute('type', 'text');
        actorInput.setAttribute('name', 'papeles[' + index + '][actor]');
        papelDiv.appendChild(actorInput);

        var actorIdLabel = document.createElement('label');
        actorIdLabel.setAttribute('for', 'actor_id_' + index);
        actorIdLabel.textContent = 'Actor ID:';
        papelDiv.appendChild(actorIdLabel);

        var actorIdInput = document.createElement('input');
        actorIdInput.setAttribute('type', 'text');
        actorIdInput.setAttribute('name', 'papeles[' + index + '][actor_id]');
        papelDiv.appendChild(actorIdInput);

        var eliminarButton = document.createElement('button');
        eliminarButton.textContent = 'Eliminar Papel';
        eliminarButton.type = 'button';
        eliminarButton.addEventListener('click', function() {
            container.removeChild(papelDiv);
        });
        papelDiv.appendChild(eliminarButton);

        container.appendChild(papelDiv);
    });
</script>
@endsection
