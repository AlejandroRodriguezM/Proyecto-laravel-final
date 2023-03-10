@extends('layouts.layout')
@section('title', 'Activar articulos')
@section('content')
    @if (auth()->guest())
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endif
    <header class="py-3">
        <div class="container">
            <h3> Hola <b>{{ auth()->user()->nombre_usuario }}</b>, activa o elimina los artículos publicados</h3>
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
                    @foreach ($articulos as $articulo)
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/' . $articulo->imagen) }}" alt="{{ $articulo->titulo }}"
                                        class="img-fluid" style="width: 100%;height: 15vw;object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-grid gap-3">
                                        <h5 class="card-title">Nombre del articulo: <a
                                                href="{{ route('ver_articulo', $articulo->id) }}">{{ $articulo->titulo }}</a>
                                        </h5>
                                        <p class="card-text">Contenido: {{ $articulo->contenido }}</p>
                                        <p class="card-text">Fecha de creación: {{ $articulo->created_at->diffForHumans() }}
                                        </p>
                                        <p class="card-text">Articulo: {{ $articulo->usuario->nombre_usuario }}</p>
                                        <div class="d-flex align-items-center justify-content-between">
                                            @if ($articulo->estado == 1)
                                                <button class="btn btn-secondary btn-sm" disabled>Activado</button>
                                            @else
                                                <form action="{{ route('articulos_activar', $articulo->id) }}"
                                                    method="get">
                                                    @csrf
                                                    @if(auth()->user()->esEditor(auth()->user()->id))
                                                    <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                                    @else
                                                    <button type="button" class="btn btn-success btn-sm" style="cursor: not-allowed;">Activar</button>
                                                    @endif

                                                </form>
                                            @endif
                                            <form action="{{ route('eliminar_articulo', $articulo->id) }}" method="get"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar este articulo?')">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>

        <a href="{{ route('home') }}" class="btn btn-secondary">Volver a entradas</a>
    </main>
@endsection
