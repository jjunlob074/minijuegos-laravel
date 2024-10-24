<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PROYECTO_JJUNLOB074') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.bunny.net/css?family=permanent-marker:400" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js','resources/css/app.css'])
</head>

<body>
    <div id="app">
        <div id="particles-js"></div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container animate__animated animate__backInDown">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Laravel">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__backInDown" href="{{ route('home') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__backInDown" href="{{ route('rankings') }}">Rankings</a>
                        </li>
                        @if(str_contains(url()->current(), '/home'))
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__backInDown" href="#minigames">Minigames</a>
                        </li>              
                        @endif
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__backInDown" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__backInDown" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item animate__animated animate__backInDown" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        Sobre Nosotros
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Descubre más acerca de nuestro equipo y nuestra pasión por los minijuegos. En Minijuegos, nos
                            esforzamos por ofrecer la mejor experiencia de juego posible para todos los usuarios.
                            Nuestro equipo está formado por apasionados desarrolladores, diseñadores y amantes de los
                            juegos que trabajan juntos para crear un mundo lleno de diversión y entretenimiento.</p>
                        <p>Explora nuestras historias, conoce a los miembros del equipo y descubre cómo estamos
                            comprometidos a llevar la alegría de los minijuegos a jugadores de todas partes del mundo.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Términos y Condiciones
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>Revisa nuestras políticas y condiciones para disfrutar de una experiencia segura en
                            Minijuegos. Queremos garantizar que todos los usuarios disfruten de un ambiente de juego
                            justo, respetuoso y emocionante.</p>
                        <p>Al utilizar nuestros servicios, aceptas nuestros términos y condiciones, que incluyen pautas
                            de comportamiento, políticas de privacidad y normas para mantener una comunidad positiva.
                            Nos esforzamos por proporcionar un entorno seguro y amigable para jugadores de todas las
                            edades.</p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Contacto
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>¿Tienes preguntas o sugerencias? ¡No dudes en ponerte en contacto con nosotros! En
                            Minijuegos, valoramos la retroalimentación de nuestros usuarios y estamos aquí para ayudarte
                            en todo lo que necesites.</p>
                        <p>Puedes contactarnos a través de nuestro formulario en línea, enviarnos un correo electrónico
                            o conectarte con nosotros en nuestras redes sociales. Estamos disponibles para responder tus
                            preguntas, resolver problemas y asegurarnos de que tu experiencia en Minijuegos sea
                            excepcional.</p>
                    </div>
                </div>
            </div>
        </div>
        <section id="sprite">
            <div id="sky">
                <div id="sea">
                    <div id="bern"></div>
                </div>
            </div>
        </section>
        <footer>
            <div class="footer-info">
                <p>&copy; 2023 Minijuegos. Todos los derechos reservados.</p>
                <p>Desarrollado por jjunlob074</p>
            </div>
            <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                <div class="card-header">W3C</div>
                <div class="card-body">
                    <h5 class="card-title">¡VALIDADO EL CSS!</h5>
                    <p>
                        <a href="http://jigsaw.w3.org/css-validator/check/referer">
                            <img style="border:0;width:88px;height:31px"
                                src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="¡CSS Válido!" />
                        </a>
                    </p>
                    <h5 class="card-title">¡OTRAS WEBS CREADAS EN DIW!</h5>
                    <img id="logo" src="{{ asset('images/migas.png') }}" alt="Logo" style="cursor: pointer; border-radius: 50%;">

                </div>
        </footer>
    </div>

    <!-- LIBRERIA JAVASCRIPT PARA AÑADIRLE EFECTOS DE PARTÍCULAS EN EL FONDO-->
    <script>
        document.getElementById('logo').addEventListener('click', function() {
        abrirVentana();
        });
        
        function abrirVentana() {
          // URL que se abrirá en la ventana emergente
        var enlace = 'https://migas-amigas-jjunlob074.000webhostapp.com/';
        
          // Abrir una ventana emergente con el enlace
        window.open(enlace, '_blank', 'width=600,height=400');
        }
        </script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        // Detectar si la cookie de aceptación está presente
        function verificarCookies() {
            if (document.cookie.indexOf("cookies_aceptadas") === -1) {
                mostrarModal();
            }
        }

        // Mostrar el modal
        function mostrarModal() {
            var modal = document.getElementById("cookieModal");
            modal.style.display = "block";
        }

        // Cerrar el modal
        function cerrarModal() {
            var modal = document.getElementById("cookieModal");
            modal.style.display = "none";
        }

        // Aceptar las cookies y cerrar el modal
        function aceptarCookies() {
            document.cookie = "cookies_aceptadas=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
            cerrarModal();
        }

        document.addEventListener('DOMContentLoaded', function() {
            verificarCookies();
        });
    </script>
    <script>
        const gltfModelUrl = "{{ asset('images/joystick_nes/scene.gltf') }}";
    </script>
</html>