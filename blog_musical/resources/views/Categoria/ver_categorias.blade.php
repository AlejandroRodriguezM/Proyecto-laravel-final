@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    @if (auth()->guest())
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endif
    <!-- Cabecera -->

    <header class="py-3">
        <div class="container">
            <h3> Hola <b>{{ auth()->user()->nombre_usuario }}</b>, edita, crea o elimina diferentes categorias</h3>
        </div>
    </header>

    <main class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2 class="mb-4">Categorías</h2>
        <ul class="list-group">
            @foreach ($categorias as $categoria)
                <li class="list-group-item">
                    <a href="#" class="text-decoration-none">{{ $categoria->nombre_categoria }}</a>
                    @if ($categoria->id === 1)
                        <a href="#" class="btn btn-sm btn-primary ms-3" style="cursor: not-allowed;">Modificar</a>
                        <a href="#" class="btn btn-sm btn-danger ms-3" style="cursor: not-allowed;">Eliminar</a>
                    @else
                        <a href="{{ route('modificar_categoria', $categoria->id) }}"
                            class="btn btn-sm btn-primary ms-3">Modificar</a>
                        <a href="{{ route('eliminar_categoria', $categoria->id) }}" class="btn btn-sm btn-danger ms-3"
                            onclick="return confirm('¿Estás seguro de que deseas eliminar este artículo?')">Eliminar</a>
                    @endif
                </li>
            @endforeach

        </ul>

        <form action="{{ route('ver_categorias') }}" method="post" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="nombre_categoria" class="form-label">Nombre de la nueva categoría:</label>
                <input type="text" name="nombre_categoria" id="nombre_categoria" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Crear categoría</button>
        </form>
    </main>

@endsection
