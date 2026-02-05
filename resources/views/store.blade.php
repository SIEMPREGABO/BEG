@section('name', 'Catalogo')

<x-app-layout>
    <x-alert-messages />

    <body>
        <!-- Shop -->
        <section id="shop">
            <div class="container mx-auto">
                <!-- Top Filter -->
                {{-- <div class="flex flex-col md:flex-row justify-between items-center py-4 pt-16 md:pt-28"></div> --}}
                <!-- Filter Toggle Button for Mobile -->

                <div class="flex flex-col  bg-black rounded-lg bg-opacity-50 shadow-md">
                    <!-- Filters -->

                    <div id="filters" class="w-full  p-4   text-white text  text-lg font-bold  ">
                        <!-- Category Filter -->


                        <x-categorias-grid :categorias="$categorias" titulo="NUESTRAS CATEGORÍAS" />
                        {{-- <div class="md:my-10 my-0  border-gray-line ">
                            <h3 class="h1-neon my-4 text-center">CATEGORIAS</h3>
                            <div class="flex flex-wrap justify-center ">
                                
                                @foreach ($categorias as $categoria)
                                    <div class="zoom-item disposition-item m-4 flex items-center flex-start gap-4 border-neon-green box-shadow-neon p-2"
                                        >


                                        @if ($categoria->slug === 'Ligas')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon  icon-tabler icons-tabler-outline icon-tabler-jump-rope">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M6 14v-6a3 3 0 1 1 6 0v8a3 3 0 0 0 6 0v-6" />
                                                <path
                                                    d="M16 3m0 2a2 2 0 0 1 2 -2h0a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h0a2 2 0 0 1 -2 -2z" />
                                                <path
                                                    d="M4 14m0 2a2 2 0 0 1 2 -2h0a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h0a2 2 0 0 1 -2 -2z" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Banqueria-y-Maquinas')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon  icon-tabler icons-tabler-outline icon-tabler-treadmill">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path  d="M10 3a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                                <path d="M3 14l4 1l.5 -.5" />
                                                <path d="M12 18v-3l-3 -2.923l.75 -5.077" />
                                                <path d="M6 10v-2l4 -1l2.5 2.5l2.5 .5" />
                                                <path d="M21 22a1 1 0 0 0 -1 -1h-16a1 1 0 0 0 -1 1" />
                                                <path d="M18 21l1 -11l2 -1" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Funcional-CrossFit')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-rings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                <path d="M7 15v-11" />
                                                <path d="M17 15v-11" />
                                                <path d="M3 4h18" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Agarres-y-Cojines')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-barbell">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M2 12h1" />
                                                <path d="M6 8h-2a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h2" />
                                                <path
                                                    d="M6 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z" />
                                                <path d="M9 12h6" />
                                                <path
                                                    d="M15 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z" />
                                                <path d="M18 8h2a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-2" />
                                                <path d="M22 12h-1" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Fitness')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-heartbeat">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                                                <path d="M3 13h2l2 3l2 -6l1 3h3" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Refacciones')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Yoga')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-stretching">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M16 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                <path d="M5 20l5 -.5l1 -2" />
                                                <path d="M18 20v-5h-5.5l2.5 -6.5l-5.5 1l1.5 2" />
                                            </svg>
                                        @elseif ($categoria->slug === 'Straps')
                                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-hand-grab">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 11v-3.5a1.5 1.5 0 0 1 3 0v2.5" />
                                                <path d="M11 9.5v-3a1.5 1.5 0 0 1 3 0v3.5" />
                                                <path d="M14 7.5a1.5 1.5 0 0 1 3 0v2.5" />
                                                <path
                                                    d="M17 9.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                                            </svg>
                                        @endif

                                        <span>{{ $categoria->nombre }}</span>
                                    </div>
                                @endforeach
                            </div>
                            
                        </div> --}}
                        <!-- Size Filter -->
                        {{-- <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="block items-center px-4 py-2 text-sm font-medium text-center md:hidden text-white bg-black hover:text-black rounded-lg hover:bg-white "
                            type="button">Filtrar
                            <i class="fa-solid fa-caret-down px-1"></i>
                        </button> --}}

                        <!-- Dropdown menu -->
                        {{-- <div id="dropdownSearch"
                            class="absolute  z-10 mt-2 w-60 py-5 origin-top-right rounded-md bg-gray-100 bg-opacity-90  shadow-lg  hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <form action="{{ route('Catalogo') }}" method="GET">

                                @foreach ($categorias as $categoria)
                                    <label class="flex items-center text-black text-xs ">
                                        <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}"
                                            class="form-checkbox custom-checkbox mx-2"
                                            {{ in_array($categoria->id, request('categorias', [])) ? 'checked' : '' }}>
                                        <span class="m-2">{{ $categoria->nombre }}</span>
                                    </label>
                                @endforeach
                                <div class="w-full flex justify-center items-center pt-3 ">
                                    <button type="submit"
                                        class="bg-black hover:bg-white hover:text-black text-white bg-opacity-90 font-bold my-1 px-4 rounded-full">
                                        Filtrar
                                    </button>
                                </div>
                            </form>
                        </div> --}}
                        <!-- Color Filter -->

                        <!-- Brand Filter -->

                        <!-- Rating Filter -->

                    </div>



                    <!-- Products List md:w-3/4 -->


                    <div class="w-full  p-4  text-gray-300 rounded-3xl">
                        @foreach ($categoriasConProductos as $categoria)
                            <div class="my-6">
                                <p
                                    class="text-5xl uppercase font-bold 
                                    @if ($categoria->slug === 'Ligas') matemasie-thin
                                    @elseif ($categoria->slug === 'Banqueteria-y-Maquinas')kanit-regular 
                                    @elseif ($categoria->slug === 'Funcional-CrossFit') font-mono-catalogo 
                                    @elseif ($categoria->slug === 'Agarres-y-Cojines') oswald  
                                    @elseif ($categoria->slug === 'Fitness') pt-serif-bold  
                                    @elseif ($categoria->slug === 'Refacciones') edu-vic-wa-nt-beginner  
                                    @elseif ($categoria->slug === 'Yoga') caveat  
                                    @elseif ($categoria->slug === 'Straps') rock-salt-regular @endif">
                                    {{ $categoria->nombre }}
                                </p>
                            </div>

                            <div
                                class="flex flex-wrap gap-catalogo mx-10 justify-center align-items-center 
                                @if ($categoria->slug === 'Ligas') matemasie-thin  
                                @elseif ($categoria->slug === 'Banqueteria-y-Maquinas') kanit-regular  
                                @elseif ($categoria->slug === 'Funcional-CrossFit') font-mono-catalogo text-lg 
                                @elseif ($categoria->slug === 'Agarres-y-Cojines') oswald  
                                @elseif ($categoria->slug === 'Fitness') pt-serif-bold  
                                @elseif ($categoria->slug === 'Refacciones') edu-vic-wa-nt-beginner  
                                @elseif ($categoria->slug === 'Yoga') caveat  
                                @elseif ($categoria->slug === 'Straps') rock-salt-regular @endif">
                                @foreach ($categoria->productosPaginados as $producto)
                                    <div class="p-4 disposition-product  rounded-lg  box-shadow-neon  border-neon-green hover:bg-black text-white">
                                        <div class="w-full aspect-square mb-4">
                                            <img src="{{ asset('images/' . $producto->slug . '.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg">
                                        </div>
                                        <a href="{{ route('Producto', $producto->slug) }}"
                                            class=" font-semibold mb-2">{{ $producto->nombre }}</a>

                                        <p class="my-2"></p>

                                        @if ($producto->variante)
                                            <div class="py-5 flex">
                                                <a href="{{ route('Producto', $producto->slug) }}"
                                                    class="botones-neon-green zoom-button w-full">
                                                    Ver opciones
                                                </a>
                                            </div>
                                        @else
                                            <form class="" action="{{ route('agregar-al-carrito') }}"
                                                method="post">

                                                @csrf
                                                <input type="hidden" name="category" id="category"
                                                    value="{{ $producto->category_id }}">
                                                <input type="hidden" name="product" id="product"
                                                    value="{{ $producto->id }}">
                                                <input type="hidden" id="nombre" name="nombre"
                                                    value="{{ $producto->nombre }}">
                                                <input type="hidden" id="slug" name="slug"
                                                    value="{{ $producto->slug }}">
                                                <input type="hidden" id="ancho" name="ancho"
                                                    value="{{ $producto->ancho }}">
                                                <input type="hidden" id="alto" name="alto"
                                                    value="{{ $producto->alto }}">
                                                <input type="hidden" id="largo" name="largo"
                                                    value="{{ $producto->largo }}">
                                                <input type="hidden" id="peso" name="peso"
                                                    value="{{ $producto->peso }}">
                                                <input type="hidden" id="precio" name="precio"
                                                    value="{{ $producto->precio }}">
                                                <div class="flex items-center mb-4">
                                                    <span
                                                        class="text-lg font-bold font-sans text-primary">${{ number_format($producto->precio, 2) }}</span>
                                                </div>
                                                <button type="submit"
                                                    class="botones-neon-green zoom-button w-full">
                                                    Agregar al carrito
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <a class="py-2 text-2xl 
                                @if ($categoria->slug === 'Ligas') matemasie-thin 
                                @elseif ($categoria->slug === 'Banqueteria-y-Maquinas') kanit-regular 
                                @elseif ($categoria->slug === 'Funcional-CrossFit') font-mono  
                                @elseif ($categoria->slug === 'Agarres-y-Cojines') oswald  
                                @elseif ($categoria->slug === 'Fitness') pt-serif-bold  
                                @elseif ($categoria->slug === 'Refacciones') edu-vic-wa-nt-beginner  
                                @elseif ($categoria->slug === 'Yoga') caveat  
                                @elseif ($categoria->slug === 'Straps') rock-salt-regular @endif"
                                href="{{ route('Categoria', ['Categoria' => $categoria->slug]) }}">
                                Ver más...
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </body>

</x-app-layout>
