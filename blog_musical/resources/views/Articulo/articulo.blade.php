@extends("layouts.layout")
@section("title", "Home")
@section("content")
@if (auth()->guest())
    <script>window.location = "{{ route('home') }}";</script>
@endif
<div class="container my-3">
    <h1>{{ $articulo->titulo }}</h1>
    <img class="card-img-top" src="{{ asset('images/' . $articulo->imagen) }}" alt="{{ $articulo->titulo }}"
        style="width: 100%;height: 15vw;object-fit: cover;">
    <p>{{ $articulo->contenido }}</p>
    <p>Categoría: {{ $articulo->categoria->nombre_categoria }}</p>
    <p>Fecha de creación: {{ $articulo->created_at->format('d/m/Y') }}</p>
</div>

<div class="container my-3">
    <h2>Comentarios</h2>
    <hr>
    @foreach ($comentarios as $comentario)
        @if ($comentario->estado == 1)
            <div class="card my-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $comentario->nombre }}</h5>
                    <p class="card-text">{{ $comentario->comentario }}</p>
                    <p class="card-text"><small class="text-muted">{{ $comentario->created_at->diffForHumans() }}</small></p>
                    <a href="{{ route('eliminar_comentario', $comentario->id) }}" class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Estás seguro de que deseas eliminar este comentario?')">Eliminar</a>
                </div>
            </div>
        @endif
    @endforeach
</div>
@endsection