@extends('layouts.public')
@section('content')
    <div class="flex bg-gray-700 w-full pt-[10vh] min-h-[100vh]" id="container" >
        <div class="w-[87%] md:w-3/4 mx-auto bg-gray-50 p-5 shadow-md relative">
            <h1 class="text-center font-bold text-2xl">Crear un elenco</h1>
            <form class="mt-7 px-3 md:px-9" action="{{ route('guardar_elenco') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col md:flex-row md:justify-between pb-4">
                    <div class="mb-4 md:mb-0">
                        <label class="font-medium" for="nombre_elenco">Nombre del Elenco:</label>
                        <input type="text" required class="px-1.5 border-gray-300 border rounded-lg md:ml-3" name="nombre_elenco" placeholder="Nombre del Elenco">
                    </div>
                    <div>
                        <label class="font-medium" for="imagen_elenco">Imagen del Elenco:</label>
                        <input class="md:ml-3" type="file" name="imagen_elenco" placeholder="Imagen del Elenco">
                    </div>
                </div>

                <label class="font-medium" for="descripcion_elenco">Descripción del Elenco:</label><br>
                <textarea class="border-gray-300 px-1.5 border w-full mt-3 h-20 rounded-lg" name="descripcion_elenco" placeholder="Descripción del Elenco"></textarea>


                <h2 class="mt-3 font-semibold text-md">Papeles:</h2>
                <div id="papeles-container">
                </div>

                <button class="mt-4 mx-auto md:mx-0 flex transition-transform duration-100 ease-in-out px-2.5 hover:scale-105 py-1 rounded-lg bg-orange-400 font-medium" type="button" id="agregar-papel">
                    <svg class="w-5 mr-2 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                    Agregar papel
                </button>

                <button type="submit" id="submit-button" class="md:fixed mx-auto md:mx-0 bottom-7 right-[15.5%] px-2 py-1.5 opacity-50 justify-center mt-4 md:mt-0 transition-transform duration-100 ease-in-out flex my-auto bg-cyan-400 md:w-fit w-2/3 text-white font-bold rounded" disabled>
                    <svg class="mr-2 w-4 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                    <p class="my-auto">
                        Crear elenco
                    </p>
                    </a>
                </button>
            </form>

            <script>
                document.getElementById('agregar-papel').addEventListener('click', function() {

                    var container = document.getElementById('papeles-container');
                    var index = container.children.length;

                    var papelDiv = document.createElement('div');
                    papelDiv.className = 'w-full md:w-3/4 rounded-lg border border-gray-300 p-2 md:p-4 relative my-3';

                    var flexBetweenDiv1 = document.createElement('div');
                    flexBetweenDiv1.className = 'flex flex-col md:flex-row md:justify-between';
                    papelDiv.appendChild(flexBetweenDiv1);

                    var div1 = document.createElement('div');
                    flexBetweenDiv1.appendChild(div1);

                    var personajeLabel = document.createElement('label');
                    personajeLabel.textContent = 'Personaje:';
                    div1.appendChild(personajeLabel);

                    var personajeInput = document.createElement('input');
                    personajeInput.setAttribute('type', 'text');
                    personajeInput.setAttribute('name', 'papeles[' + index + '][personaje]');
                    personajeInput.className = 'mt-2 mb-4 px-2 text-sm rounded-lg border border-gray-300';
                    personajeInput.placeholder = 'Nombre del Personaje';
                    personajeInput.required = true;
                    div1.appendChild(personajeInput);

                    var div2 = document.createElement('div');
                    flexBetweenDiv1.appendChild(div2);

                    var imagenLabel = document.createElement('label');
                    imagenLabel.textContent = 'Imagen:';
                    div2.appendChild(imagenLabel);

                    var imagenInput = document.createElement('input');
                    imagenInput.setAttribute('type', 'file');
                    imagenInput.setAttribute('name', 'papeles[' + index + '][imagen]');
                    imagenInput.className = 'mb-2';
                    imagenInput.placeholder = 'Imagen del Personaje';
                    div2.appendChild(imagenInput);

                    var descripcionLabel = document.createElement('label');
                    descripcionLabel.textContent = 'Descripción:';
                    papelDiv.appendChild(descripcionLabel);

                    var descripcionInput = document.createElement('textarea');
                    descripcionInput.setAttribute('name', 'papeles[' + index + '][descripcion]');
                    descripcionInput.className = 'w-full h-12 rounded-lg border border-gray-300 px-2 text-sm';
                    descripcionInput.placeholder = 'Descripción del Personaje';
                    papelDiv.appendChild(descripcionInput);

                    var flexBetweenDiv2 = document.createElement('div');
                    flexBetweenDiv2.className = 'my-2';
                    papelDiv.appendChild(flexBetweenDiv2);

                    var archivoMuestraLabel = document.createElement('label');
                    archivoMuestraLabel.textContent = 'Archivo de Muestra:';
                    flexBetweenDiv2.appendChild(archivoMuestraLabel);

                    var archivoMuestraInput = document.createElement('input');
                    archivoMuestraInput.setAttribute('type', 'file');
                    archivoMuestraInput.setAttribute('name', 'papeles[' + index + '][archivo_muestra]');
                    archivoMuestraInput.className = 'md:ml-3 md:mt-0 mt-2';
                    archivoMuestraInput.placeholder = 'Archivo de Muestra';
                    flexBetweenDiv2.appendChild(archivoMuestraInput);

                    var actorContainer = document.createElement('div');
                    papelDiv.appendChild(actorContainer);

                    var actorSelect = document.createElement('select');
                    actorSelect.setAttribute('name', 'papeles[' + index + '][actor_id]');
                    actorSelect.className = 'rounded-lg border border-gray-300 mt-2 mt-0';

                    actorContainer.appendChild(actorSelect);

                    var defaultOption = document.createElement('option');
                    defaultOption.setAttribute('value', '');
                    defaultOption.textContent = 'Usar actor no definido';
                    actorSelect.appendChild(defaultOption);

                    var actors = {!! $actores !!};

                    actors.forEach(function(actor) {
                        var option = document.createElement('option');
                        option.setAttribute('value', actor.id);
                        option.textContent = actor.nombre + ' ' + actor.apellido;
                        actorSelect.appendChild(option);
                    });

                    actorSelect.addEventListener('change', function() {
                        if (this.value === '') {
                            var actorNombreInput = document.createElement('input');
                            actorNombreInput.setAttribute('type', 'text');
                            actorNombreInput.setAttribute('name', 'papeles[' + index + '][actor_nombre]');
                            actorNombreInput.setAttribute('placeholder', 'Nombre del actor');
                            actorNombreInput.className = 'md:ml-3 mt-1.5 md:mt-0 rounded-md px-1.5 border border-gray-300';

                            actorContainer.appendChild(actorNombreInput);
                        } else {
                            var actorNombreInput = actorContainer.querySelector('input[name="papeles[' + index + '][actor_nombre]"]');
                            if (actorNombreInput) {
                                actorContainer.removeChild(actorNombreInput);
                            }
                        }
                    });

                    if (actorSelect.value === '') {
                        var actorNombreInput = document.createElement('input');
                        actorNombreInput.setAttribute('type', 'text');
                        actorNombreInput.setAttribute('name', 'papeles[' + index + '][actor_nombre]');
                        actorNombreInput.setAttribute('placeholder', 'Nombre del actor');
                        actorNombreInput.className = 'md:ml-3 mt-1.5 md:mt-0 rounded-md px-1.5 border border-gray-300';
                        actorContainer.appendChild(actorNombreInput);
                    }

                    var eliminarButton = document.createElement('button');
                    eliminarButton.textContent = 'Eliminar papel';
                    eliminarButton.type = 'button';
                    eliminarButton.className = 'absolute text-xs text-white font-medium rounded-lg px-2 py-1 bg-red-500 top-2 right-2';
                    eliminarButton.addEventListener('click', function() {
                        eliminarPapel(papelDiv);
                    });
                    papelDiv.appendChild(eliminarButton);

                    container.appendChild(papelDiv);

                    var numPapeles = container.children.length;
                    document.getElementById('submit-button').disabled = (numPapeles === 0);
                    document.getElementById('submit-button').classList.toggle('opacity-50', numPapeles === 0);
                    document.getElementById('submit-button').classList.toggle('hover:scale-105', numPapeles !== 0);
                });

                function eliminarPapel(papelDiv) {
                    papelDiv.parentNode.removeChild(papelDiv);

                    var numPapeles = document.getElementById('papeles-container').children.length;
                    document.getElementById('submit-button').disabled = (numPapeles === 0);
                    document.getElementById('submit-button').classList.toggle('opacity-50', numPapeles === 0);
                    document.getElementById('submit-button').classList.toggle('hover:scale-105', numPapeles !== 0);
                }
            </script>

@endsection
