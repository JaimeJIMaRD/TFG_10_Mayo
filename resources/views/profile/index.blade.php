@extends('layouts.public')

@section('content')
    <div class="container pl-3 pt-[10.5vh]">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Perfil de usuario</div>

                    <div class="card-body">
                        <p>Correo electrónico: {{ Auth::user()->email }}</p>
                        <p>Nombre: {{ Auth::user()->name }}</p>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                        </form>

                        <h3 class="mt-5">Comentarios del usuario</h3>
                        @if(Auth::user()->comentarios->count() > 0)
                            <ul>
                                @foreach(Auth::user()->comentarios as $comentario)
                                    <li>{{ $comentario->contenido }} - {{ $comentario->created_at }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No hay comentarios realizados por este usuario.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
