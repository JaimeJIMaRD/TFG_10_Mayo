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
                <div class="w-full bg-gray-400 scale-[103%] hover:scale-[103%] hover:bg-gray-50 rounded-3xl my-2 h-20 flex justify-center align-middle">
                    <p class="my-auto">Actores</p>
                </div>
            </a>
            <a href="{{ route('admin.user.index') }}" class="md:w-full w-1/3">
                <div class="w-full bg-gray-50 scale-[103%] hover:bg-gray-50 my-2 rounded-3xl h-20 flex justify-center align-middle">
                    <p class="my-auto">Usuarios</p>
                </div>
            </a>

        </div>
        <div class="mx-auto">
            <h1 class="text-center my-4">Listado de Usuarios</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->rol == 0)
                        Usuario
                    @elseif ($user->rol == 1)
                        Administrador
                    @endif
                </td>
                <td>
                    @if ($user->rol == 0)
                        <form action="{{ route('admin.users.changeRole', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Hacer Admin</button>
                        </form>
                    @elseif ($user->rol == 1)
                        <form action="{{ route('admin.users.changeRole', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="bg-yellow-500 text-white px-2 py-1 rounded">Quitar Admin</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    </div>
@endsection
