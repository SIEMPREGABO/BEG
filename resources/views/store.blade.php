@section('name', 'Catalogo')

<x-app-layout>

    <body>
        <!-- Shop -->
        <section id="shop">
            <div class="container mx-auto">
                <!-- Top Filter -->
                <div class="flex flex-col md:flex-row justify-between items-center py-4 pt-16 md:pt-28"></div>
                <!-- Filter Toggle Button for Mobile -->

                <div class="flex flex-col md:flex-row bg-black rounded-lg bg-opacity-50 shadow-md">
                    <!-- Filters -->

                    <div id="filters" class="w-full md:w-1/4 p-4   text-gray-400  text-lg font-bold  ">
                        <!-- Category Filter -->
                        <div class="md:my-10 my-0  border-gray-line hidden md:block">
                            <form action="{{ route('Catalogo') }}" method="GET">
                                <h3 class="text-2xl font-semibold uppercase  mb-6">Categoria</h3>
                                <div class="space-y-2">
                                    @foreach ($categorias as $categoria)
                                        <label class="flex items-center">
                                            <input type="checkbox" name="categorias[]" value="{{ $categoria->id }}"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array($categoria->id, request('categorias', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">{{ $categoria->nombre }}</span>
                                        </label>
                                    @endforeach
                                    <div class="w-full flex justify-center items-center ">
                                        <button type="submit"
                                            class="bg-black hover:bg-white hover:text-black text-white font-bold my-1 py-1 px-4 rounded-full">
                                            Filtrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Size Filter -->
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="block items-center px-4 py-2 text-sm font-medium text-center md:hidden text-white bg-black hover:text-black rounded-lg hover:bg-white "
                            type="button">Filtrar
                            <i class="fa-solid fa-caret-down px-1"></i>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch"
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
                        </div>
                        <!-- Color Filter -->

                        <!-- Brand Filter -->

                        <!-- Rating Filter -->

                    </div>



                    <!-- Products List md:w-3/4 -->


                    <div class="w-full md:3/4 p-4  text-gray-300 rounded-3xl">
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
                                class="grid grid-cols-1 py-2 my-2 sm:grid-cols-2 lg:grid-cols-3 gap-4  
                                @if ($categoria->slug === 'Ligas') matemasie-thin  
                                @elseif ($categoria->slug === 'Banqueteria-y-Maquinas') kanit-regular  
                                @elseif ($categoria->slug === 'Funcional-CrossFit') font-mono-catalogo text-lg 
                                @elseif ($categoria->slug === 'Agarres-y-Cojines') oswald  
                                @elseif ($categoria->slug === 'Fitness') pt-serif-bold  
                                @elseif ($categoria->slug === 'Refacciones') edu-vic-wa-nt-beginner  
                                @elseif ($categoria->slug === 'Yoga') caveat  
                                @elseif ($categoria->slug === 'Straps') rock-salt-regular @endif">
                                @foreach ($categoria->productosPaginados as $producto)
                                    <div class="p-4 rounded-lg shadow hover:bg-black hover:text-white">
                                        <img src="{{ asset('images/' . $producto->slug . '.jpg') }}"
                                            class="w-full object-cover mb-4 rounded-lg">
                                        <a href="{{ route('Producto', $producto->slug) }}"
                                            class=" font-semibold mb-2">{{ $producto->nombre }}</a>

                                        <p class="my-2"></p>

                                        @if ($producto->variante)
                                            <div class="py-5 flex">
                                                <a href="{{ route('Producto', $producto->slug) }}"
                                                    class="bg-primary border border-transparent hover:bg-white text-center hover:border-primary text-gray-500 hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
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
                                                <input type="hidden" id="precio" name="precio"
                                                    value="{{ $producto->precio }}">
                                                <div class="flex items-center mb-4">
                                                    <span
                                                        class="text-lg font-bold font-sans text-primary">${{ number_format($producto->precio, 2) }}</span>
                                                </div>
                                                <button type="submit"
                                                    class="bg-primary border border-transparent hover:bg-white hover:border-primary text-gray-500 hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
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
