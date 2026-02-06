@section('name', 'Catalogo')

<x-app-layout>
    <x-alert-messages />

    <body>

        <section id="shop">
            <div class="container mx-auto">

                <div class="flex flex-col  bg-black rounded-lg bg-opacity-50 shadow-md">
                    

                    <div id="filters" class="w-full  p-4   text-white text  text-lg font-bold  ">
                       


                        {{-- <x-categorias-grid :categorias="$categorias" titulo="NUESTRAS CATEGORÍAS" /> --}}
                       
                    </div>




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
