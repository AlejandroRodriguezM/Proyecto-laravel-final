@extends('layouts.layout')
@section('title', 'Comentarios')
@section('content')
    <header class="py-3">
        <div class="container">
            <h1>Comentarios</h1>
        </div>
    </header>

    <main class="container my-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card mb-3">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @foreach ($comentarios as $comentario)
                        <div class="card mb-3">
                            <div class="card-body d-grid gap-3">
                                <h5 class="card-title">Nombre de usuario: {{ $comentario->nombre }}</h5>
                                <p class="card-text">Comentario: {{ $comentario->comentario }}</p>
                                <p class="card-text">Fecha de creación: {{ $comentario->created_at->diffForHumans() }}</p>
                                <div class="d-flex align-items-center justify-content-between">
                                    @if ($comentario->estado == 1)
                                        <button class="btn btn-secondary btn-sm" disabled>Activado</button>
                                    @else
                                        <form action="{{ route('comentarios_activar', $comentario->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                        </form>
                                    @endif
                                    <form action="{{ route('eliminar_comentario', $comentario->id) }}" method="post"
                                        onsubmit="return confirm('¿Estás seguro de que deseas eliminar este comentario?')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach



                </ul>
            </div>
        </div>

        <a href="#" class="btn btn-secondary">Volver a entradas</a>
    </main>
@endsection
