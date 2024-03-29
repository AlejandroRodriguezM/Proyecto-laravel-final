@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    @auth
        <header class="py-3">
            <div class="container">
                <h3> Hola <b>{{ auth()->user()->nombre_usuario }}</b> activa los usuarios como editores</h3>
            </div>
        </header>
    @endauth
    <main class="container my-3">
        <div class="card mb-3">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->nombre_usuario }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>
                                    @if ($usuario->esEditor($usuario->id))
                                        <button type="button" class="btn btn-success" disabled>Activado</button>
                                    @else
                                        @if (Auth::user()->esEditor(auth()->id()))
                                            <form action="{{ route('editores_agregarEditor', $usuario->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Hacer Editor</button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-primary"
                                                style="cursor: not-allowed;">Hacer Editor</button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver a entradas</a>
    </main>
@endsection
