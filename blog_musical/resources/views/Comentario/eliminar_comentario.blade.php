@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    @if (auth()->guest())
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endif
    <div class="container">
        <h1>Eliminar artículo</h1>
        <p>¿Estás seguro de que quieres eliminar este comentario?</p>
        <form action="{{ route('eliminar_comentario', $article->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
