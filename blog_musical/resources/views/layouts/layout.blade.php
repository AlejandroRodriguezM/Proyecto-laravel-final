<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
    <title>@yield('title')</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">Sound Shine</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('articulos') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Articulos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('comentarios') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Comentarios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('escribir_articulo') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Escribir un articulo</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('editores') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Desbloquear(Editores)</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('ver_categorias') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Categorias</a>
                            </li>

                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('home') }}">
                                    @php
                                        session()->forget(['success', 'error']);
                                    @endphp
                                    Inicio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Categorías
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li><a href="{{ route('biografia') }}" class="dropdown-item"
                                            class="dropdown-item">Biografia</a></li>
                                    <li><a href="{{ route('anecdotas') }}" class="dropdown-item"
                                            class="dropdown-item">Anecdotas</a></li>
                                    <li><a href="{{ route('integrantes') }}" class="dropdown-item"
                                            class="dropdown-item">Integrantes</a></li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
                <form id="buscador" action="{{ route('busqueda') }}" method="get"
                    class="d-flex justify-content-end">
                    <input id="buscar-input" class="form-control me-2" name='q' type="search"
                        placeholder="Buscar..." aria-label="Search">
                    <button id="buscar-btn" class="btn btn-outline-success me-2" type="submit">Buscar</button>
                </form>

                @guest
                    <!-- Opciones de menú para usuario no logueado -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Accede</a>

                    <a href="{{ route('register') }}" class="btn btn-primary">Regístrate</a>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                    </form>
                @endauth
            </div>
        </nav>

        @auth
            <section class="jumbotron administracion">
                <div class="container">
                    <h1 style="color:blue">ADMINISTRACIÓN</h1>
                    <p style="color:blue">
                        Página de Administración.
                    </p>

                    <br>
                </div>
            </section>
        @endauth

        @guest
            <section class="jumbotron">
                <div class="container">
                </div>
            </section>
        @endguest
    </header>
    <main>
        @yield('content')
    </main>

    <footer style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p>Tarea 6 por Alejandro, Inma, Antonia</p>
                </div>
                <div class="col-6">
                    <ul class="list-inline text-end">
                        <li><a href="{{ route('home') }}" style="text-decoration: none; color: #212529;">Inicio</a>
                        </li>
                        @guest
                            <li><a href="{{ route('login') }}" style="text-decoration: none; color: #212529;">Accede</a>
                            </li>
                        @endguest
                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li><a href="{{ route('logout') }}" style="text-decoration: none; color: #212529;">Cerrar
                                        sesión</a></li>
                            </form>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        document.getElementById('buscador').addEventListener('submit', function(event) {
            if (document.getElementById('buscar-input').value.trim() === '') {
                event.preventDefault(); // cancela la solicitud
            }
        });
    </script>
</body>

</html>
