@extends('layouts.layout')
@section('title', 'Discografia')
@section('content')
    @auth
        <script>
            window.location = "{{ route('home') }}";
        </script>
    @endauth
    <div class="container my-5">
        <h2>Guitarrista y teclista</h2>

        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            <div class="col">
                <div class="card">
                    <iframe width="415" height="315" src="https://www.youtube.com/embed/SnL5FQxDBXE"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Javi Malagamba</h5>
                        <p class="card-text">Javi Malagamba es un talentoso músico de Málaga, España, que forma parte de la
                            banda de rock Soundshine desde su formación en 2010. Es un guitarrista y tecladista habilidoso y
                            creativo que contribuye en gran medida al sonido auténtico y emocionante de la banda.

                            La música ha sido una parte importante de la vida de Javi desde una edad temprana. Aprendió a
                            tocar la guitarra por su cuenta y comenzó a tocar en bandas locales mientras todavía estaba en
                            la escuela secundaria. Más tarde, estudió música en la universidad, donde también se involucró
                            en varios proyectos y bandas de música.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <iframe width="415" height="315" src="https://www.youtube.com/embed/17yoECsWAq0"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Denice Daley</h5>
                        <p class="card-text">Denice se destacó desde temprana edad por su talento musical y comenzó a
                            participar en competencias de canto a nivel local en su ciudad natal. Más tarde, se unió a la
                            banda de rock Soundshine como vocalista principal y ha contribuido significativamente al sonido
                            auténtico y emocionante de la banda.

                            Además de su trabajo en Soundshine, Denice ha participado en varios programas de televisión y
                            festivales de música, donde ha demostrado su talento y ha impresionado a audiencias con su
                            impresionante voz y presencia en el escenario.

                        </p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <iframe width="415" height="315" src="https://www.youtube.com/embed/cK4Vnq2-y6s"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <div class="card-body">
                        <h5 class="card-title">Franc De Luna</h5>
                        <p class="card-text">Franc de Luna tiene 27 años y viene de Málaga. Ha llegado imparable con una de
                            sus canciones favoritas: "Don't stop me now" de Queen. Y como dice la letra: "Es una estrella
                            fugaz atravesando el cielo como un tigre" y los sentidos de nuestro jurado que le han dado la
                            inmunidad.

                            Ha sido una actuación arrolladora. Al buen rollo de este famoso tema se le suma la energía que
                            le ha añadido Franc de Luna, ha valorado Jesús Reina. Para Mariola Cantarero, Franc va
                            "sobradísimo". Ha sido la primera en encender la estrella. Solo le hizo falta escuchar un agudo
                            y ha dicho que le gustaría verlo en un musical. Pastora Soler ha asegurado que "es un cantante y
                            artista con mayúsculas", y ha destacado la energía ante el reto de "una canción difícil
                            haciéndola fácil". Los deseos de Mariola Cantarero son órdenes y Fran de Luna tendrá que
                            interpretar a Jesucristo Superstar en el siguiente desafío..</p>
                    </div>
                </div>
            </div>

            {{-- <div class="col">
                <div class="card">
                    <img src="https://upload.wikimedia.org/wikipedia/en/b/bf/ElvisPresleySomethingForEverybodyLPCover.jpg"
                        class="card-img-top" alt="Something for Everybody (1961)">
                    <div class="card-body">
                        <h5 class="card-title">Something for Everybody (1961)</h5>
                        <p class="card-text">Álbum de estudio que incluye canciones como "There's Always Me" y "I Want You
                            With Me".</p>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
