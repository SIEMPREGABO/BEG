<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('name', 'BEG')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/3c72140922.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    @vite('resources/css/app.css')

</head>

<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed"
    style="background-image: url({{ asset('images/header.png') }});">

    <nav class="max-w-7xl mx-auto px-2 md:px-6 lg:px-8 container">
        <!-- PC -->
        <div class="relative flex items-center justify-center h-16">
            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                <button id="user-movil-button"
                    class="fa fa-bars inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-hidden="true"></button>
            </div>
            <div class="flex-1 flex items-center justify-center md:items-stretch md:justify-start">
                <div class="flex-shrink-0">
                    <a class="flex items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
                        href="{{ route('Home') }}">
                        BY &nbsp;
                        <span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                            EVERICKS GYM
                        </span>
                    </a>
                </div>
                <div class="hidden md:flex md:space-x-2 md:ml-auto md:items-center">

                    @if (Auth::check())
                        @if (Auth::user()->isAdmin === 0)
                            <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1  rounded-md lg:text-base text-sm font-medium"
                                href="{{ route('Home') }}"> Home </a>
                            <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1 rounded-md lg:text-base text-sm font-medium"
                                href="{{ route('Catalogo') }}"> Catálogo </a>
                            <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1 rounded-md lg:text-base text-sm font-medium"
                                href="{{ route('Contacto') }}"> Conócenos </a>
                        @endif
                    @else
                        <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1  rounded-md lg:text-base text-sm font-medium"
                            href="{{ route('Home') }}"> Home </a>
                        <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1 rounded-md lg:text-base text-sm font-medium"
                            href="{{ route('Catalogo') }}"> Catálogo </a>
                        <a class="text-gray-500 hover:bg-gray-700 block lg:px-4 py-3 px-1 rounded-md lg:text-base text-sm font-medium"
                            href="{{ route('Contacto') }}"> Conócenos </a>
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
                                    class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-gray-100 py-1 shadow-lg  hidden"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    @if (Auth::user()->isAdmin === 0)
                                        <a href="{{ route('Perfil') }}"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:text-indigo-400 "
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                                        <a href="{{ route('Pedidos') }}"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:text-indigo-400"
                                            role="menuitem" tabindex="-1" id="user-menu-item-1">Mis pedidos</a>
                                    @else
                                        <a href="{{ route('Panel') }}"
                                            class="block px-4 py-3 text-sm text-gray-700 hover:text-indigo-400 "
                                            role="menuitem" tabindex="-1" id="user-menu-item-0">Panel</a>
                                    @endif
                                    <a href="{{ route('Logout') }}"
                                        class="block px-4 py-3 text-sm text-gray-700 hover:text-indigo-400"
                                        role="menuitem" tabindex="-1" id="user-menu-item-2">Cerrar Sesión</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Mostrar botones de ingresar y registrar -->
                        <a class="bg-gradient-to-r from-purple-800 to-blue-600 hover:from-pink-500 hover:to-purple-500
                            text-white font-bold justify-center text-sm md:text-base md:py-2 md:px-5 lg:mx-1 px-2 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Registro') }}">
                            Registrate
                        </a>
                        <a class="bg-gradient-to-r from-purple-800 to-blue-600 hover:from-pink-500 hover:to-purple-500
                            text-white font-bold justify-center text-sm md:text-base md:py-2 md:px-5 px-2  rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Ingreso') }}">
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
                            <a href="{{ route('Carrito') }}" class="flex items-center justify-center lg:px-4">
                                <i class="fa fa-shopping-cart fa-2xl rounded-md text-gray-400 hover:text-white   "
                                    aria-hidden="true"></i>
                                <i class="px-2 lg:text-xl text-gray-400 hover:text-white">{{ $totalProductos }}</i>
                            </a>
                        @endif
                    @else
                        <a href="{{ route('Carrito') }}" class="flex items-center justify-center lg:px-4">
                            <i class="fa fa-shopping-cart fa-2xl rounded-md text-gray-400 hover:text-white   "
                                aria-hidden="true"></i>
                            <i class="px-2 lg:text-xl text-gray-400 hover:text-white">{{ $totalProductos }}</i>
                        </a>
                    @endif

                </div>
            </div>
            @if (Auth::check())
                @if (Auth::user()->isAdmin === 0)
                    <div class=" right-0 flex items-center md:hidden">
                        <a href="{{ route('Carrito') }}"><i
                                class="fa fa-shopping-cart inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                aria-hidden="true">
                            </i>
                        </a>
                    </div>
                @endif
            @else
                <div class=" right-0 flex items-center md:hidden">
                    <a href="{{ route('Carrito') }}"><i
                            class="fa fa-shopping-cart inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-hidden="true">
                        </i>
                    </a>
                </div>
            @endif
        </div>

        <!-- Movil -->
        <div class="md:hidden " id="mobile-menu">
            <div class="px-2 pt-2  ">
                @if (Auth::check())
                    @if (Auth::user()->isAdmin === 0)
                        <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Home') }}"> Home </a>
                        <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Catalogo') }}"> Catálogo </a>
                        <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Contacto') }}"> Conócenos </a>
                    @endif
                @else
                    <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Home') }}"> Home </a>
                    <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Catalogo') }}"> Catálogo </a>
                    <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Contacto') }}"> Conócenos </a>
                @endif
                @if (Auth::check())
                    <div
                        class="block  text-pink-500 no-underline  hover:text-underline 
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
                        <a class="block text-pink-500 hover:text-blue-300  no-underline  hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Perfil') }}"> Perfil </a>
                        <a class="block text-pink-500 hover:text-blue-300 no-underline hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Pedidos') }}"> Mis pedidos </a>
                    @else
                        <a class="block text-pink-500 hover:text-blue-300 no-underline hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                            href="{{ route('Panel') }}"> Panel </a>
                    @endif
                    <a class="block text-pink-500 hover:text-blue-300 no-underline  hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Logout') }}"> Cerrar Sesión </a>
                @else
                    <a class="block text-blue-300 no-underline hover:text-pink-500  hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Registro') }}"> Registrate </a>
                    <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 duration-300 ease-in-out"
                        href="{{ route('Ingreso') }}"> Ingresa </a>
                @endif
            </div>
        </div>
    </nav>



    {{ $slot }}


    <footer>
        <div class="container pt-10  lg:pt-20 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
                <!-- PC -->
                <div class="w-full items-center justify-between hidden md:flex">

                    <div class="text-gray-500 no-underline hover:no-underline flex flex-row items-center space-x-2">
                        <img width="50" height="50" src="{{ asset('images/Logo_BEG.png') }}"
                            alt="Evericks Gym Logo" />
                        <span>&copy; By evericks gym</span>
                    </div>
                    <div class="flex w-1/2 justify-end content-center">
                        <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                            href="{{ route('Home') }}">
                            Home
                        </a>
                        @if (Auth::check())
                            @if (Auth::user()->isAdmin === 0)
                                <div
                                    class="inline-block text-blue-300 no-underline  hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                                    |
                                </div>
                                <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                    href="{{ route('Catalogo') }}">
                                    Catálogo
                                </a>
                                <div
                                    class="inline-block text-blue-300 no-underline  hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                                    |
                                </div>
                                <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                    href="{{ route('Contacto') }}">
                                    Contacto
                                </a>
                            @endif
                        @else
                            <div
                                class="inline-block text-blue-300 no-underline  hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                                |
                            </div>
                            <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                href="{{ route('Catalogo') }}">
                                Catálogo
                            </a>
                            <div
                                class="inline-block text-blue-300 no-underline  hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out">
                                |
                            </div>
                            <a class="inline-block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                href="{{ route('Contacto') }}">
                                Contacto
                            </a>
                        @endif
                    </div>
                </div>
                <!-- MOVIL -->
                <div class=" md:hidden  md:space-x-4 md:ml-auto">

                    <div class="px-2 pt-2  ">

                        <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                            text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                            href="{{ route('Home') }}"> Home </a>
                        @if (Auth::check())
                            @if (Auth::user()->isAdmin === 0)
                                <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                        text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                    href="{{ route('Catalogo') }}"> Catálogo </a>
                                <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                        text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                    href="{{ route('Contacto') }}"> Contacto </a>
                            @endif
                        @else
                            <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                                text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                href="{{ route('Catalogo') }}"> Catálogo </a>
                            <a class="block text-blue-300 no-underline hover:text-pink-500 hover:text-underline 
                                text-center h-10 p-2 md:h-auto md:p-4 transform hover:scale-125 duration-300 ease-in-out"
                                href="{{ route('Contacto') }}"> Contacto </a>
                        @endif

                        <div class="flex justify-center items-center text-blue-300 no-underline py-2">
                            <div class="flex flex-wrap items-center ">
                                <img width="50" height="50" class=""
                                    src="{{ asset('images/Logo_BEG.png') }}" alt="Evericks Gym Logo" />
                                <span class="px-3">&copy; By evericks gym</span>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </footer>
    @vite(['resources/js/general.js'])

</body>

</html>
