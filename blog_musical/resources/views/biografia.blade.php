@extends('layouts.layout')
@section('title', 'Discografia')
@section('content')
    @auth
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endauth
    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Quienes son sound shine</h2>
                <p class="lead">
                    Soundshine es una banda de rock de covers relativamente nueva que se formó en 2021 en Málaga, España. A
                    pesar de ser una banda joven, los miembros de Soundshine tienen experiencia previa en otras bandas y
                    proyectos musicales.
                </p>

            </div>
            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-16by9 rounded"></div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/TP6r7sZV8Bg"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen class="embed-responsive-item"></iframe>
            </div>
        </div>
    </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/6HZikWg49bc"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <h3>Informacion sobre la banda</h3>
                <p>La banda se especializa en tocar versiones de algunas de las mejores canciones de rock de todos los
                    tiempos, desde clásicos del rock hasta canciones más modernas y populares. Su objetivo es ofrecer una
                    experiencia musical emocionante y auténtica que haga que los oyentes se sientan transportados a través
                    del tiempo y el espacio.

                    Los miembros de Soundshine son talentosos músicos que se esfuerzan por crear un sonido auténtico y fiel
                    a las canciones originales. La banda está compuesta por un cantante con una voz potente y expresiva, un
                    guitarrista con habilidades impresionantes, un bajista con un gran sentido del ritmo y un baterista
                    apasionado que impulsa el sonido de la banda.

                    En resumen, Soundshine es una banda de rock de covers relativamente nueva que se formó en 2021 en
                    Málaga, España. Su enfoque es ofrecer una experiencia musical emocionante y auténtica a través de la
                    interpretación de algunas de las mejores canciones de rock de todos los tiempos. Con su talento y pasión
                    por la música, Soundshine es una banda que promete ofrecer un espectáculo impresionante para cualquier
                    amante del rock.</p>
            </div>
        </div>
    </div>

    {{-- <div class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h3>La muerte de Elvis</h3>
                <p>Elvis murió trágicamente en su casa de Graceland en Memphis, Tennessee, el 16 dede agosto de 1977. Tenía
                    solo 42 años. La causa oficial de su muerte fue un ataque cardíaco, pero su legado en la música y la
                    cultura popular continúa hasta el día de hoy.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/elvis2.jpg') }}" alt="Elvis Presley" class="img-fluid rounded">
            </div>
        </div>
    </div> --}}

@endsection
