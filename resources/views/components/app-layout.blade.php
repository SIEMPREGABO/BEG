<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('name', 'BEG')</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <script src="https://kit.fontawesome.com/3c72140922.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script src="/assets/js/header.js"></script>
    <link href="/output.css" rel="stylesheet">
    <script src="/assets/js/jquery-3.7.1.min.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- <link rel="preload" href="{{ asset('images/header.webp') }}" as="image"> --}}

</head>

<body class="leading-normal tracking-normal text-indigo-400  bg-cover bg-fixed">

    <nav style="width: 100%;" class="pb-8 md:pb-24">

        <div id="navbar-complete" class="border-neon-green relative flex items-center justify-evenly h-16">
            <div class="absolute inset-y-0 left-0 flex items-center mobile-nav">
                <div id="user-movil-button"
                    class="fa fa-bars inline-flex items-center justify-center ml-3 p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                </div>
            </div>
            <div style="display: flex; justify-content: space-around; align-items: center; width: 100%;" class=" ">
                <div class="">
                    <a id="logo-complete" class="h1 h1-neon" href="{{ route('Home') }}">
                        BY &nbsp;
                        <span class="">
                            EVERICKS GYM

                        </span>
                    </a>
                </div>
                <!-- PC -->
                <div class=" header-pc ">

                    @if (Auth::check())
                        @if (Auth::user()->isAdmin === 0)
                            <a class="link-desktop" href="{{ route('Home') }}"> Home </a>
                            <a class="link-desktop" href="{{ route('Categoria', 'Ligas') }}"> Catálogo </a>
                            <a class="link-desktop" href="{{ route('Contacto') }}"> Conócenos </a>
                        @endif
                    @else
                        <a class="link-desktop" href="{{ route('Home') }}"> Home </a>
                        <a class="link-desktop" href="{{ route('Categoria', 'Ligas') }}"> Catálogo </a>
                        <a class="link-desktop" href="{{ route('Contacto') }}"> Conócenos </a>
                    @endif


                    @if (Auth::check())
                        <!-- Mostrar nombre del usuario autenticado -->
                        <div
                            class="absolute inset-y-0 right-0 flex items-center sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                            <div class="relative">

                                <div
                                    class="text-sm lg:text-base lg:py-2 lg:px-5 lg:mx-1 px-2 flex flex-row justify-center items-center">
                                    @if (Auth::user()->mayorista)
                                        <div class="flex flex-col justify-center items-center px-1">
                                            <i class="fa-solid text-xl text-yellow-500 fa-medal "></i>
                                            <p class=" text-xs text-gray-400">Mayorista</p>
                                        </div>
                                    @endif
                                    <p>Bienvenido @if (Auth::user()->isAdmin === 1)
                                            Administrador
                                        @endif {{ Auth::user()->nombre_pila }}!</p>
                                    <button type="button" id="user-menu-button"
                                        class="fa-solid fa-angle-down p-1 border-none"></button>
                                </div>

                                <div id="user-menu"
                                    class="absolute right-0 z-10 mt-2 w-48 border-neon-green border origin-top-right rounded-md py-1 shadow-lg  hidden"
                                    style="background-color: #000"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    @if (Auth::user()->isAdmin === 0)
                                        <a href="{{ route('Perfil') }}"
                                            class="block px-4 py-3  text-color-neon "
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                                        <a href="{{ route('Pedidos') }}"
                                            class="block px-4 py-3 text-color-neon"
                                            role="menuitem" tabindex="-1" id="user-menu-item-1">Mis pedidos</a>
                                    @else
                                        <a href="{{ route('Panel') }}"
                                            class="block px-4 py-3 text-color-neon "
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">Panel</a>
                                    @endif
                                    <a href="{{ route('Logout') }}"
                                        class="block px-4 py-3  text-color-neon"
                                        role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Mostrar botones de ingresar y registrar -->
                        <a id="button-login-1" class="botones-neon-green" href="{{ route('Registro') }}">
                            Registrate
                        </a>
                        <a id="button-login-2" class="botones-neon-green" href="{{ route('Ingreso') }}">
                            Ingresa
                        </a>

                    @endif


                    @php
                        $carrito = Session::get('carrito', []);
                        $totalProductos = array_reduce(
                            $carrito,
                            function ($carry, $item) {
                                return $carry + $item['cantidad'];
                            },
                            0,
                        );
                    @endphp
                    @if (Auth::check())
                        @if (Auth::user()->isAdmin === 0)
                            <a href="{{ route('Carrito') }}"
                                class="flex items-center justify-center mr-3 lg:px-4 hover:text-white ">
                                <i class="fa fa-shopping-cart fa-2xl rounded-md text-gray-400   "></i>
                                <i class="px-2 lg:text-xl text-gray-400 ">{{ $totalProductos }}</i>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('Carrito') }}"
                            class="flex items-center justify-center mr-3 lg:px-4 hover:text-white ">
                            <i class="fa fa-shopping-cart fa-2xl rounded-md text-gray-400   "></i>
                            <i class="px-2 lg:text-xl text-gray-400 ">{{ $totalProductos }}</i>
                        </a>
                    @endif

                </div>
            </div>
            @if (Auth::check())
                @if (Auth::user()->isAdmin === 0)
                    <div class=" right-0 flex items-center icon-shop">
                        <a href="{{ route('Carrito') }}"><i
                                class="fa fa-shopping-cart inline-flex m-3 items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            </i>
                        </a>
                    </div>
                @endif
            @else
                <div class=" right-0 flex items-center icon-shop">
                    <a href="{{ route('Carrito') }}"><i
                            class="fa fa-shopping-cart inline-flex m-3 items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        </i>
                    </a>
                </div>
            @endif
        </div>

        <!-- tablet y movil -->
        <div id="header-tablet"
            style=" 
        justify-content: space-around; 
        align-items: center; width: 100%; 
        margin-bottom: 5px;padding-block: 5px;
        "
            class="header-tablet border-bottom-neon-green">
            <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                href="{{ route('Home') }}">
                Home
            </a>

            <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                href="{{ route('Categoria', 'Ligas') }}">
                Catálogo
            </a>

            <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                href="{{ route('Contacto') }}">
                Conócenos
            </a>

            @if (Auth::check())

                @if (Auth::user()->mayorista)
                    <div class="flex flex-col justify-center items-center px-1">
                        <i class="fa-solid text-xl text-yellow-500 fa-medal "></i>
                        <p class=" text-xs text-gray-400">Mayorista</p>
                    </div>
                @endif
                <p>Bienvenido @if (Auth::user()->isAdmin === 1)
                        Administrador
                    @endif {{ Auth::user()->nombre_pila }}!</p>
                <button type="button" id="user-menu-button-tablet"
                    class="fa-solid fa-angle-down p-1 border-none"></button>

                <div id="user-menu-tablet" style="top: 18%; margin-top:1rem;background-color: #000;"
                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md border-neon-green  py-1 shadow-lg  hidden"
                    
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button-tablet"
                    tabindex="-1">
                    @if (Auth::user()->isAdmin === 0)
                        <a href="{{ route('Perfil') }}"
                            class="block px-4 py-3 text-color-neon "
                            role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                        <a href="{{ route('Pedidos') }}"
                            class="block px-4 py-3 text-color-neon "
                            role="menuitem" tabindex="-1" id="user-menu-item-1">Mis pedidos</a>
                    @else
                        <a href="{{ route('Panel') }}"
                            class="block px-4 py-3 text-color-neon "
                            role="menuitem" tabindex="-1" id="user-menu-item-0">Panel</a>
                    @endif
                    <a href="{{ route('Logout') }}"
                        class="block px-4 py-3 text-color-neon "
                        role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar Sesión</a>
                </div>
            @else
                <a id="button-login-3"
                    class=" botones-neon-green link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                    href="{{ route('Registro') }}">
                    Registrate
                </a>

                <a id="button-login-4"
                    class=" botones-neon-green link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                    href="{{ route('Ingreso') }}">
                    Ingresa
                </a>
            @endif


        </div>

        <!-- Movil -->
        <div class=" mobile-nav transform transition-all duration-300 ease-in-out" id="mobile-menu">
            <div class="px-2 pt-2  mx-5 ">
                @if (Auth::check())
                    @if (Auth::user()->isAdmin === 0)
                        <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                            href="{{ route('Home') }}">
                            Home
                        </a>

                        <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                            href="{{ route('Categoria', 'Ligas') }}">
                            Catálogo
                        </a>

                        <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                            href="{{ route('Contacto') }}">
                            Conócenos
                        </a>
                    @endif
                @else
                    <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                        href="{{ route('Home') }}">
                        Home
                    </a>

                    <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                        href="{{ route('Categoria', 'Ligas') }}">
                        Catálogo
                    </a>

                    <a class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                        href="{{ route('Contacto') }}">
                        Conócenos
                    </a>




                @endif
                @if (Auth::check())
                    <div
                        class="block link-mobile no-underline  hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4">

                        <p>Bienvenido @if (Auth::user()->isAdmin === 1)
                                Administrador
                            @endif {{ Auth::user()->nombre_pila }}!
                            @if (Auth::user()->mayorista)
                                <i class="fa-solid text-xl text-yellow-500 fa-medal  px-2"></i>Mayorista
                            @endif
                        </p>
                    </div>
                    @if (Auth::user()->isAdmin === 0)
                        <a class="link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2"
                            href="{{ route('Perfil') }}"> Perfil </a>
                        <a class="link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2"
                            href="{{ route('Pedidos') }}"> Mis pedidos </a>
                    @else
                        <a class="link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2"
                            href="{{ route('Panel') }}"> Panel </a>
                    @endif
                    <a class="link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2"
                        href="{{ route('Logout') }}"> Cerrar Sesión </a>
                @else
                    <a id=""
                        class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                        href="{{ route('Registro') }}">
                        Registrate
                    </a>

                    <a id=""
                        class=" link-mobile transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                        href="{{ route('Ingreso') }}">
                        Ingresa
                    </a>
                @endif
            </div>
        </div>
    </nav>



    {{ $slot }}


    <footer style=" margin-top: 50px;">
        <div class="container pt-2   mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="w-full pt-4 pb-6 text-sm text-center md:text-left fade-in">
                <!-- PC -->
                <div class="w-full items-center justify-center hidden md:flex">

                    <div class="text-gray-500 no-underline hover:no-underline flex flex-row items-center space-x-2">
                        {{-- <img width="50" height="50" src="{{ asset('images/Logo_BEG.png') }}"
                            alt="Evericks Gym Logo" /> --}}
                        <div class="">
                            <a id="logo-footer-complete-1" class="h1 h1-neon margin-block"
                                href="{{ route('Home') }}">
                                BY &nbsp;
                                <span class="">
                                    EVERICKS GYM
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                            href="{{ route('Home') }}">
                            Home
                        </a>
                        @if (Auth::check())
                            @if (Auth::user()->isAdmin === 0)
                                <div
                                    class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 ">
                                    |
                                </div>
                                <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                    href="{{ route('Categoria', 'Ligas') }}">
                                    Catálogo
                                </a>
                                <div
                                    class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 ">
                                    |
                                </div>
                                <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                    href="{{ route('Contacto') }}">
                                    Contacto
                                </a>
                            @endif
                        @else
                            <div class=" subtitle-neon h-10 p-2 ">
                                |
                            </div>
                            <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                href="{{ route('Categoria', 'Ligas') }}">
                                Catálogo
                            </a>
                            <div class=" subtitle-neon h-10 p-2 ">
                                |
                            </div>
                            <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                href="{{ route('Categoria', 'Ligas') }}">
                                Contacto
                            </a>
                        @endif
                    </div>
                </div>
                <!-- MOVIL -->
                <div class=" md:hidden  md:space-x-4 md:ml-auto">

                    <div class="px-2 pt-2  ">
                        <div class="flex justify-center items-center no-underline py-2">
                            <div class="flex flex-wrap items-center ">
                                <a id="logo-footer-complete-2" class="h1 h1-neon margin-block"
                                    href="{{ route('Home') }}">
                                    BY &nbsp;
                                    <span class="">
                                        EVERICKS GYM
                                    </span>
                                </a>
                            </div>
                        </div>


                        <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                            href="{{ route('Home') }}"> Home </a>
                        @if (Auth::check())
                            @if (Auth::user()->isAdmin === 0)
                                <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                    href="{{ route('Categoria', 'Ligas') }}"> Catálogo </a>
                                <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                    href="{{ route('Contacto') }}"> Contacto </a>
                            @endif
                        @else
                            <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                href="{{ route('Categoria', 'Ligas') }}"> Catálogo </a>
                            <a class=" link-desktop transform hover:scale-125 duration-300 ease-in-out hover:link-desktop-hover h-10 p-2 "
                                href="{{ route('Contacto') }}"> Contacto </a>
                        @endif


                    </div>



                </div>

                <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-500">
                    <p>© 2025 ByEvericksGym. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $('DOMContentLoaded').ready(function() {
            $('#user-movil-button').click(function() {
                $('#mobile-menu').slideToggle("slow");
            });
        });
        //$('#mobile-menu').slideDown(0); // Oculta el menú al cargar la página
        //let namePage = @json(Request::route()->getName());
        const namePage = window.location.pathname;
        let estilo = "";
        textcolor = "";
        tabletborder = "";
        switch (namePage) {
            case '/Catalogo/Banqueria-y-Maquinas':
                estilo = "botones-neon-purple";
                textcolor = "shadow-purple";
                tabletborder = "border-bottom-neon-purple";
                break;
            case '/Catalogo/Funcional-CrossFit':
                estilo = "botones-neon-blue";
                textcolor = "shadow-blue";
                tabletborder = "border-bottom-neon-blue";
                break;
            case '/Catalogo/Agarres-y-Cojines':
                estilo = "botones-neon-cyan";
                textcolor = "shadow-cyan";
                tabletborder = "border-bottom-neon-cyan";
                break;
            case '/Catalogo/Fitness':
                estilo = "botones-neon-magenta";
                textcolor = "shadow-magenta";
                tabletborder = "border-bottom-neon-magenta";
                break;
            case '/Catalogo/Refacciones':
                estilo = "botones-neon-orange";
                textcolor = "shadow-orange";
                tabletborder = "border-bottom-neon-orange";
                break;
            case '/Catalogo/Yoga':
                estilo = "botones-neon-red";
                textcolor = "shadow-red";
                tabletborder = "border-bottom-neon-red";
                break;
            case '/Catalogo/Straps':
                estilo = "botones-neon-yellow";
                textcolor = "shadow-yellow";
                tabletborder = "border-bottom-neon-yellow";
                break;
            default:
                estilo = "";
                textcolor = "";
                tabletborder = "";
                break;
        }

        // Seleccionar todos los elementos con id que empiecen con "button-login-"
        const buttonLogins = document.querySelectorAll('[id^="button-login-"]');
        buttonLogins.forEach(button => {
            button.classList.add(estilo);
        });

        const titleFooter = document.querySelectorAll('[id^="logo-footer-complete-"]');

        if (titleFooter && textcolor !== "") {
            titleFooter.forEach(button => {
                button.classList.add(textcolor);
            });
        }


        if(tabletborder !== ""){

            document.getElementById("header-tablet").classList.add(tabletborder);
        }
        if(estilo !== ""){

            document.getElementById("navbar-complete").classList.add(estilo);
        }
        if(textcolor !== ""){
            document.getElementById("logo-complete").classList.add(textcolor);
        }
        //document.getElementById("logo-footer-complete").classList.add(textcolor);

        if (document.getElementById("floating-button")) {
            document.getElementById("floating-button").classList.add(estilo);
        }

        if (document.getElementById("dropdownSearch")) {
            document.getElementById("dropdownSearch").classList.add(estilo);
        }

        //console.log(namePage, "estoy en la pagina");
    </script>

</body>

</html>
