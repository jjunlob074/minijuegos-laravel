@extends('layouts.app')

@section('content')

</style>
<div id="cookieModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModal()">&times;</span>
        <p>Esto es una modal para utilizar las cookies similar a un banner de cookies en una web</p>
        <button id="modalbutton" onclick="aceptarCookies()">Aceptar</button>
    </div>
</div>
<header>
<div class="header">
    <div id="canvas-container">
        <div id="text-container">
            <h1 class= "animate__animated animate__backInLeft">¡BIENVENIDO A LA WEB DE MINIJUEGOS!</h1>
        </div>
    </div>
</div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/cards.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/cards.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/cards.jpg') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</header>
<section id="dataweb">
    <h1>
        <!-- Palabra 1: Bienvenido -->
        <span style="--i:1;">B</span>
        <span style="--i:2;">i</span>
        <span style="--i:3;">e</span>
        <span style="--i:4;">n</span>
        <span style="--i:5;">v</span>
        <span style="--i:6;">e</span>
        <span style="--i:7;">n</span>
        <span style="--i:8;">i</span>
        <span style="--i:9;">d</span>
        <span style="--i:10;">o</span>
    
        <!-- Separación entre palabras -->
        <span style="--i:11;"> </span>
    
        <!-- Palabra 2: al proyecto -->
        <span style="--i:12;">a</span>
        <span style="--i:13;">l</span>
        <span style="--i:14;"> </span>
        <span style="--i:15;">p</span>
        <span style="--i:16;">r</span>
        <span style="--i:17;">o</span>
        <span style="--i:18;">y</span>
        <span style="--i:19;">e</span>
        <span style="--i:20;">c</span>
        <span style="--i:21;">t</span>
        <span style="--i:22;">o</span>
    
        <!-- Separación entre palabras -->
        <span style="--i:23;"> </span>
    
        <!-- Palabra 3: de Minijuegos -->
        <span style="--i:24;">d</span>
        <span style="--i:25;">e</span>
        <span style="--i:26;"> </span>
        <span style="--i:27;">M</span>
        <span style="--i:28;">i</span>
        <span style="--i:29;">n</span>
        <span style="--i:30;">i</span>
        <span style="--i:31;">j</span>
        <span style="--i:32;">u</span>
        <span style="--i:33;">e</span>
        <span style="--i:34;">g</span>
        <span style="--i:35;">o</span>
        <span style="--i:36;">s</span>
      </h1>
    <p>Explora una variedad de divertidos minijuegos que te mantendrán entretenido. ¡Diviértete y compite con tus amigos para alcanzar la puntuación más alta!</p>
</section>
<section id = "minigames">
    <div class="mt-16">
        <div class="row row-cols-1 row-cols-md-3 g-4 g-lg-8">
            <!-- Enlace al primer minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/simon.jpeg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$minijuegos->first()->name}}</h5>
                        <p class="card-text">{{ $minijuegos->first()->description }}</p>
                        <a href="{{route('SimonDice')}}" class="btn btn-warning">¡ JUGAR !</a>
                    </div>
                </div>
            </div>

            <!-- Agrega más enlaces a otros minijuegos según sea necesario -->

            <!-- Enlace al segundo minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/solarsystem.jpg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">SISTEMA SOLAR</h5>
                        <p class="card-text">¡Haz una visita 3D interactiva por nuestro sistema solar, donde tú tienes el control de la cámara, hecho con three.js!</p>
                        <a href="{{route('solarsystem')}}" class="btn btn-warning">¡ VISITAR !</a>
                    </div>
                </div>
            </div>

            <!-- Agrega más enlaces a otros minijuegos según sea necesario -->

            <!-- Enlace al tercer minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/d3.png') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">D3 javascript</h5>
                        <p class="card-text">¡Javacript tiene muchas librerías útiles, una de ellas es D3, que permite hacer tratamiento de datos y gráficas increibles!</p>
                        <a href="https://codepen.io/Jose-Diego-JDbasketman-Junquera/pen/WNLNZEJ" target = "_blank" class="btn btn-warning">¡ EJEMPLO D3 !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Otra sección -->
    <div class="seccion mt-4">
        <div class="row row-cols-1 row-cols-md-3 g-4 g-lg-8">
            <!-- Enlace al cuarto minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/descarga.jpeg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">MINIGAME</h5>
                        <p class="card-text">Some quick example text to build on the MINIGAME and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-warning">¡ JUGAR !</a>
                    </div>
                </div>
            </div>

            <!-- Agrega más enlaces a otros minijuegos según sea necesario -->

            <!-- Enlace al quinto minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/descarga.jpeg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">MINIGAME</h5>
                        <p class="card-text">Some quick example text to build on the MINIGAME and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-warning">¡ JUGAR !</a>
                    </div>
                </div>
            </div>

            <!-- Agrega más enlaces a otros minijuegos según sea necesario -->

            <!-- Enlace al sexto minijuego -->
            <div class="col">
                <div class="card mx-auto" style="width: 24rem;">
                    <img src="{{ asset('images/descarga.jpeg') }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">MINIGAME</h5>
                        <p class="card-text">Some quick example text to build on the MINIGAME and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-warning">¡ JUGAR !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id = "magic-slider">
    <!-- Swiper 1 -->
    <div id="reference" class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="{{ asset('images/person.png') }}" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/skin.png') }}" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/treasure.jpeg') }}" />
        </div>
        <div class="swiper-slide">
          <img src="{{ asset('images/attack.png') }}" />
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div id="message">
      ¡CONSIGUE TODO ESTO JUGANDO!
    </div>
    <!-- Swiper 2 -->
    <div class="swiper mySwiper2">
      <div class="swiper-wrapper">
        <div class="swiper-slide">¡GANA PERSONAJES!</div>
        <div class="swiper-slide">¡SKINS!</div>
        <div class="swiper-slide">¡RECOMPENSAS!</div>
        <div class="swiper-slide">¡LUCHA Y DIVIERTETE!</div>
      </div>
      <!-- No olvides agregar la paginación y los botones de navegación si es necesario -->
      <div class="swiper-pagination"></div>
      
    </div>
  </section>
<section id = "video">
    <div class="card">
        <div class="card-header">
          <h2>¡Nuestros mejores minijuegos!</h2>
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <iframe width="100%" height="500" src="https://www.youtube.com/embed/8RZ25eHHu7g?si=UK7vNuHOJLbWTJX0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
            <footer class="blockquote-footer">
                @guest
                <a style = "color:#222;" href = "{{route('register')}}">¡REGISTRATE YA!</a>
                @endguest
                @auth
                <h4 style = "color:#222;">¡TE HAS REGISTRADO! GRACIAS {{Auth::user()->name}}</h4>
                @endauth
            </footer>
          </blockquote>
        </div>
      </div>
</section>

<!--SCRIPTS ESPECÍFICOS DE ESTA PÁGINA -->

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
      effect: "cube",
      grabCursor: true,
      cubeEffect: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 20,
        shadowScale: 0.94,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });
  </script>
    <script>
        var swiper2 = new Swiper(".mySwiper2", {
          effect: "cards",
          grabCursor: true,
        });
    </script>
<script src="{{ asset('js/3d.js') }}" type = "module"></script>
@endsection
