@extends('layouts.public')
@section('content')
    <div class="container md:flex pt-[10vh] w-full h-[100vh]">
        <div class="w-full md:block gap-2 md:w-1/3 bg-gray-800 flex p-3 shadow-lg md:shadow-2xl">
            <a href="{{ route('admin.personajes.index') }}" class="md:w-full w-1/3">
                <div class="w-full bg-gray-400 hover:scale-[103%] hover:bg-gray-50 rounded-3xl my-2 h-20 flex justify-center align-middle">
                    <p class="my-auto">Personajes</p>
                </div>
            </a>
            <a href="{{ route('admin.actores.index') }}" class="md:w-full w-1/3">
                <div class="w-full bg-gray-50 scale-[103%] hover:scale-[103%] hover:bg-gray-50 rounded-3xl my-2 h-20 flex justify-center align-middle">
                    <p class="my-auto">Actores</p>
                </div>
            </a>
            <a href="{{ route('admin.user.index') }}" class="md:w-full w-1/3">
                <div class="w-full bg-gray-400 hover:scale-[103%] hover:bg-gray-50 my-2 rounded-3xl h-20 flex justify-center align-middle">
                    <p class="my-auto">Usuarios</p>
                </div>
            </a>

        </div>
        <div class="mx-auto">
            <h1 class="text-center my-4">Listado de Actores</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Estado</th>
            <th>Foto ID</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($actores as $actor)
            <tr>
                <td>{{ $actor->nombre }}</td>
                <td>{{ $actor->apellido }}</td>
                <td>{{ $actor->estado }}</td>
                <td>{{ $actor->foto_id }}</td>
                <td>
                    <a href="{{ route('admin.actores.edit', $actor->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Editar</a>
                    <form action="{{ route('admin.actores.delete', $actor->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        <a href="{{ route('admin.actores.create') }}" class="px-1 rounded py-1 bg-amber-500 w-auto text-decoration-none">Crear actor</a>
    </div>
</div>
    </div>
@endsection

