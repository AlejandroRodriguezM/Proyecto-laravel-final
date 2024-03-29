@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    @auth
        <!-- Cabecera -->
        <header class="py-3">
            <div class="container">
                <h3> Hola <b>{{ auth()->user()->nombre_usuario }}</b>, edita, crea o elimina los artículos publicados</h3>
                <a href="{{ route('escribir_articulo') }}" class="btn btn-outline-primary me-2">Crear artículo</a>
            </div>
        </header>
    @endauth
    @guest
        <header class="py-3">
            <div class="container">
                <h3> Hola <b>Invitado</b></h3>
            </div>
        </header>
    @endguest
    @auth
        <!-- Contenido principal -->
        <main class="container my-3">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <h2>Listado de artículos</h2>


            <table class="table">
                <thead>
                    <tr>
                        <td scope="col">Título</td>
                        <td scope="col">Categoría</td>
                        <td scope="col">Fecha de creación</td>
                        <td scope="col">Autor</td>
                        <td scope="col">Estado</td>
                        <td scope="col">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articulos as $articulo)
                        <tr>
                            <td><a href="{{ route('ver_articulo', $articulo->id) }}">{{ $articulo->titulo }}</a></td>
                            <td>{{ $articulo->categoria->nombre_categoria }}</td>
                            <td>{{ $articulo->created_at->format('d/m/Y') }}</td>
                            <td>{{ $articulo->usuario->nombre_usuario }}</td>
                            <td>
                                @if ($articulo->estado == 1)
                                    <span class="badge bg-success">Activado</span>
                                @else
                                    <span class="badge bg-danger">Desactivado</span>
                                @endif
                            <td>
                                <a href="{{ route('ver_articulo', $articulo->id) }}" class="btn btn-primary">Ver</a>
                                @if (auth()->user()->esEditor(auth()->user()->id))
                                    <a href="{{ route('modificar_articulo', $articulo->id) }}"
                                        class="btn btn-warning">Modificar</a>
                                    <a href="{{ route('eliminar_articulo', $articulo->id) }}" class="btn btn-danger"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?')">Eliminar</a>
                                @else
                                    <a href="#" class="btn btn-warning" style="cursor: not-allowed;">Modificar</a>
                                    <a href="#" class="btn btn-danger" style="cursor: not-allowed;">Eliminar</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    @endauth
    @guest

        <div class="container">
            <h1>Articulos</h1>
        </div>

        <main class="container my-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h2>Listado de artículos</h2>
            <div class="row">
                @foreach ($articulos as $articulo)
                    @if ($articulo->estado == 1)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{ asset('images/' . $articulo->imagen) }}"
                                    alt="{{ $articulo->titulo }}" style="width: 100%;height: 15vw;object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"> <a href="{{ route('ver_articulo', $articulo->id) }}"
                                            class="btn btn-warning">{{ $articulo->titulo }}</a></h5>
                                    <p class="card-text">{{ $articulo->contenido }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ $articulo->categoria->nombre_categoria }}</small>
                                        <small class="text-muted">{{ $articulo->created_at->format('d/m/Y') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </main>
    @endguest
@endsection
