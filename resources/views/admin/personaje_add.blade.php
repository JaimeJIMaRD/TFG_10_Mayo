<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Personaje</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.personajes.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="serie">Serie:</label>
                            <input type="text" name="serie" id="serie" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="muestra">Muestra:</label>
                            <input type="file" name="muestra" id="muestra" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="imagen_logo">Imagen del Logo:</label>
                            <input type="file" name="imagen_logo" id="imagen_logo" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="imagen_fondo">Imagen de Fondo:</label>
                            <input type="file" name="imagen_fondo" id="imagen_fondo" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label for="actor_id">ID del Actor:</label>
                            <input type="number" name="actor_id" id="actor_id" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Crear Personaje</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
