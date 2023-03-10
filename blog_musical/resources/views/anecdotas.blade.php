@extends('layouts.layout')
@section('title', 'Home')
@section('content')
    @auth
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endauth
    <div class="container my-5">
        <h1 class="text-center mb-4">Anécdotas de la banda de Sound Shine</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/cantante.jpg') }}" alt="Denice Daley">
                    <div class="card-body">
                        <p class="card-text">Una anécdota interesante sobre Denice Daley es que en una ocasión, durante un
                            concierto en vivo, se produjo una falla técnica en el micrófono justo antes de que Denice
                            comenzara su actuación. Sin embargo, en lugar de detenerse y pedir otro micrófono, Denice
                            decidió cantar sin él, lo que dejó a la audiencia atónita por su impresionante capacidad vocal y
                            su habilidad para llenar la sala con su voz sin ningún tipo de amplificación.

                            Después del concierto, varios asistentes del espectáculo le preguntaron sobre su impresionante
                            actuación, y Denice simplemente respondió con una sonrisa: "La música no necesita micrófonos
                            para ser sentida y disfrutada". Este incidente demostró su profesionalismo y dedicación a su
                            arte, y dejó una impresión duradera en aquellos que tuvieron la suerte de presenciar su
                            actuación.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/cantante2.jpg') }}" alt="Franc de Luna">
                    <div class="card-body">
                        <p class="card-text">Este malagueño ha sido capaz de trasmitir buen rollo y energía con este tema
                            rockero y con una voz que va sobradísimo, según el jurado.

                            Si quieres disfrutar de más actuaciones destacadas de la noche, visita la web de "Tierra de
                            talento".</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{ asset('images/guitarrista.jpg') }}" alt="Javi Malagamba">
                    <div class="card-body">
                        <p class="card-text">En una ocasión, durante un ensayo con la banda, Javi decidió probar una nueva
                            técnica en su guitarra que involucraba tocar con los dientes, algo que había visto a Jimi
                            Hendrix hacer en un video en línea. Después de varios intentos fallidos y de casi romper una de
                            las cuerdas de su guitarra, Javi finalmente logró ejecutar la técnica de manera impresionante y
                            sorprendió a sus compañeros de banda.

                            Desde ese momento, la técnica de tocar con los dientes se convirtió en una rutina en las
                            presentaciones en vivo de la banda, lo que siempre causaba asombro y entusiasmo en la audiencia.
                            Esta anécdota demuestra la pasión y el deseo de Javi de explorar nuevas técnicas y sonidos, y su
                            capacidad de incorporarlas en su estilo personal de tocar la guitarra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
