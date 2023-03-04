@extends('layouts.layout')
@section('title', 'Activar Comentario')
@section('content')
    @if (auth()->guest())
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endif
    <div class="container my-3">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title">Activar articulo</h2>
                <p class="card-text">{{ $comentario->texto }}</p>
                @if ($comentario->activo)
                    <p class="card-text text-success">El articulo ya está activado</p>
                @else
                    <form action="{{ route('articulos_activar', $comentario->id) }}" method="post" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Activar</button>
                    </form>
                @endif
                <a href="{{ route('home') }}" class="btn btn-secondary">Volver a Comentarios</a>
            </div>
        </div>
    </div>
@endsection
