@section('name', $category->slug)

<x-app-layout>
    <x-alert-messages />

    <body>
        <!-- Shop -->
        <section id="shop">
            <div class="container mx-auto  text-gray-300  bg-opacity-50 shadow-md rounded-3xl">
                @php

                    $claseTitulo = '';
                    $claseSelect = '';
                    if($category->slug === 'Ligas') {
                        $claseTitulo = 'input_neon_green';
                        $claseSelect = 'select-green';
                    } elseif ($category->slug === 'Banqueria-y-Maquinas') {
                        //dd($category);
                        $claseTitulo = 'input_neon_purple';
                        $claseSelect = 'select-purple';
                    } elseif ($category->slug === 'Funcional-CrossFit') {
                        $claseTitulo = 'input_neon_blue';
                        $claseSelect = 'select-blue';
                    } elseif ($category->slug === 'Agarres-y-Cojines') {
                        $claseTitulo = 'input_neon_cyan';
                        $claseSelect = 'select-cyan';
                    } elseif ($category->slug === 'Fitness') {
                        $claseTitulo = 'input_neon_magenta';
                        $claseSelect = 'select-magenta';
                    } elseif ($category->slug === 'Refacciones') {
                        $claseTitulo = 'input_neon_orange';
                        $claseSelect = 'select-orange';
                    } elseif ($category->slug === 'Yoga') {
                        $claseTitulo = 'input_neon_red';
                        $claseSelect = 'select-red';
                    } elseif ($category->slug === 'Straps') {
                        $claseTitulo = 'input_neon_yellow';
                        $claseSelect = 'select-yellow';
                    }
                @endphp


                
                <!-- Top Filter -->
                {{-- <div class="my-10 px-5">


                    <p
                        class=" text-5xl uppercase font-bold @if ($category->slug === 'Ligas') matemasie-thin @elseif ($category->slug === 'Banqueteria-y-Maquinas') kanit-regular @elseif ($category->slug === 'Funcional-CrossFit') font-mono-catalogo
                    @elseif ($category->slug === 'Agarres-y-Cojines') oswald @elseif ($category->slug === 'Fitness') pt-serif-bold @elseif ($category->slug === 'Refacciones') edu-vic-wa-nt-beginner 
                    @elseif ($category->slug === 'Yoga') caveat @elseif ($category->slug === 'Straps') rock-salt-regular @endif py-3">
                        {{ $category->nombre }}</p>
                </div> --}}
                <x-categorias-grid :categorias="$categorias" titulo="{{ $category->nombre }}"  :category="$category" />
                <div class="flex flex-col">

                    <!-- Filters -->
                    <div id="filters" class="container mx-auto md:block">

                        <div class="  border-gray-line hidden md:block text-gray-400 font-sans  ">
                            <form class="contenedor-filtro"
                                action="{{ route('Categoria', ['Categoria' => $category->slug]) }}" method="GET">
                                <!-- Category Filter -->
                                <div class=" item-filtro-nombre">
                                    <h3 class="text-lg font-semibold my-2">Nombre</h3>
                                    <div class="space-y-2">
                                        <input type="text" id="nombre" name="nombre" class="{{ $claseTitulo }}"
                                            placeholder="Nombre">
                                    </div>
                                </div>
                                <!-- Size Filter -->
                                <div class="item-filtro">
                                    <h3 class="text-lg font-semibold my-2">Precio</h3>
                                    <div class="space-y-2">


                                        <select id="precios" name="precios" class="{{ $claseTitulo }} {{ $claseSelect }}">
                                            <option>-</option>
                                            <option value="100-500">$100 - $500</option>
                                            <option value="500-1000">$500 - $1000</option>
                                            <option value="1000-5000">$1000 - $5000</option>
                                            <option value="5000-10000">$5000 - $10000</option>
                                            <option value="10000-50000">$10000 - $50000</option>
                                            <option value="50000+">$50000+</option>

                                        </select>
                                        {{-- <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="100-500"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('100-500', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$100 - $500</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="500-1000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('500-1000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$500 - $1000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="1000-5000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('1000-5000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$1000 - $5000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="5000-10000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('5000-10000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$5000 - $10000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="10000-50000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('10000-50000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$10000 - $50000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="50000+"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('50000+', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$50000+</span>
                                        </label> --}}
                                    </div>
                                </div>

                                <!-- Color Filter -->
                                <div class="item-filtro ">
                                    <h3 class="text-lg font-semibold my-2">Variación del producto</h3>
                                    <div class="space-y-2">
                                        <select type="text" id="variante" name="variante" class="{{ $claseTitulo }} {{ $claseSelect }}">
                                            <option>-</option>
                                            <option value="1">Variante</option>
                                            <option value="0">Sin variante</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Brand Filter -->
                                {{-- <div class="w-full flex justify-center items-center py-5">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 py-1 px-4 rounded-full">
                                        Filtrar
                                    </button>
                                </div> --}}
                            </form>
                        </div>

                        <!-- Rating Filter -->
                        {{-- <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="block items-center px-4 py-2 text-sm font-medium text-center md:hidden text-white bg-black hover:text-black rounded-lg hover:bg-white "
                            type="button">Filtrar
                            <i class="fa-solid fa-caret-down px-1"></i>
                        </button> --}}

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch" class="hidden" role="menu" aria-orientation="vertical"
                            aria-labelledby="user-menu-button" tabindex="-1">
                            <form action="{{ route('Categoria', ['Categoria' => $category->slug]) }}" method="GET">
                                <!-- Category Filter -->
                                <div class=" mx-2">
                                    <h3 class=" font-semibold my-2">Nombre</h3>
                                    <div class="space-y-2">
                                        <input type="text" id="nombre" name="nombre"
                                            class="{{ $claseTitulo }}" placeholder="Nombre">
                                    </div>
                                </div>
                                <!-- Size Filter -->
                                <div class="mx-2">
                                    <h3 class=" font-semibold py-2">Precio</h3>
                                    <select id="precios" name="precios" class="{{ $claseSelect }}">
                                        <option>-</option>
                                        <option value="100-500">$100 - $500</option>
                                        <option value="500-1000">$500 - $1000</option>
                                        <option value="1000-5000">$1000 - $5000</option>
                                        <option value="5000-10000">$5000 - $10000</option>
                                        <option value="10000-50000">$10000 - $50000</option>
                                        <option value="50000+">$50000+</option>

                                    </select>
                                    {{-- <div class="space-y-2 font-semibold">
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="100-500"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('100-500', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$100 - $500</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="500-1000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('500-1000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$500 - $1000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="1000-5000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('1000-5000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$1000 - $5000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="5000-10000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('5000-10000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$5000 - $10000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="10000-50000"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('10000-50000', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$10000 - $50000</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="checkbox" name="precios[]" value="50000+"
                                                class="form-checkbox custom-checkbox"
                                                {{ in_array('50000+', request('precios', [])) ? 'checked' : '' }}>
                                            <span class="ml-2">$50000+</span>
                                        </label>
                                    </div> --}}
                                </div>

                                <!-- Color Filter -->
                                <div class=" mx-2  py-2 ">
                                    <h3 class="font-semibold py-2">Variación del producto</h3>
                                    <div class="space-y-2">
                                        <select type="text" id="variante" name="variante" class="{{ $claseSelect }}">
                                            <option>-</option>
                                            <option value="1">Variante</option>
                                            <option value="0">Sin variante</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Brand Filter -->
                                <div class="w-full flex justify-center items-center ">
                                    <button type="submit"
                                        class="text-white bg-black hover:text-black hover:bg-white  font-bold my-1 py-1 px-4 rounded-full">
                                        Filtrar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Products List -->
                    <div class="w-full p-4">
                        <!-- Products grid -->

                        {{-- <div class="contenedor-filtro ">
                            <!-- Product 1 -->
                            @foreach ($products as $producto)
                                <div
                                    class="p-4 item-filtro  rounded-lg  box-shadow-neon  border-neon-green hover:bg-black text-white">
                                    <div class="w-full aspect-square mb-4">
                                        <img src="{{ asset('images/' . $producto->slug . '.jpg') }}"
                                            class="w-full h-full object-cover rounded-lg">
                                    </div>
                                    <a href="{{ route('Producto', $producto->slug) }}"
                                        class=" font-semibold mb-2">{{ $producto->nombre }}</a>
                                    <p class=" my-2"></p>
                                    @if ($producto->variante)
                                        <div class="py-5 flex ">
                                            <a href="{{ route('Producto', $producto->slug) }}"
                                                class="botones-neon-green zoom-button w-full">
                                                Ver opciones
                                            </a>
                                        </div>
                                    @else
                                        <form class="" action="{{ route('agregar-al-carrito') }}"
                                            method="post">
                                            @csrf
                                            <input type="hidden" name="product" id="product"
                                                value="{{ $producto->id }}">
                                            <input type="hidden" name="category" id="category"
                                                value="{{ $producto->category_id }}">
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
                                                <!--span class="text-sm line-through ml-2">$24.99</span-->
                                            </div>
                                            <button type="submit" class="botones-neon-green zoom-button w-full">
                                                Agregar al carrito
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            @endforeach
                        </div> --}}

                        <x-carousel-productos :productos="$products"
                            titulo="PRODUCTOS DE {{ strtoupper($category->nombre) }}" 
                            id="carousel-categoria"
                            :category="$category" />
                        <!-- Pagination -->
                        {{-- <div class="flex justify-end mt-8 mx-auto text-white font-sans">
                            <nav aria-label="Page navigation example ">
                                {{ $products->links() }}
                            </nav>
                        </div> --}}
                        <button id="floating-button" class="floating-button d-floating-button"
                            onclick="toggleFilters()">
                            <i class="fas fa-sliders-h"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Función para mostrar/ocultar el menú desplegable de filtros
            function toggleFilters() {
                const dropdown = document.getElementById('dropdownSearch');
                const floatingButton = document.getElementById('floating-button');
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    floatingButton.classList.add('active');

                } else {
                    dropdown.classList.add('hidden');
                    floatingButton.classList.remove('active');
                }


            }


            document.addEventListener('click', function(event) {
                const dropdown = document.getElementById('dropdownSearch');
                const floatingButton = document.getElementById('floating-button');

                // Verificar si el click fue fuera del dropdown y del botón
                if (!dropdown.contains(event.target) && !floatingButton.contains(event.target)) {
                    dropdown.classList.add('hidden');
                    floatingButton.classList.remove('active');
                }
            });

            // Prevenir que el click dentro del dropdown lo cierre
            document.getElementById('dropdownSearch').addEventListener('click', function(event) {
                event.stopPropagation();
            });

            // Cerrar con la tecla Escape
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    const dropdown = document.getElementById('dropdownSearch');
                    const floatingButton = document.getElementById('floating-button');
                    dropdown.classList.add('hidden');
                    floatingButton.classList.remove('active');
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);

                // Verificar si hay algún parámetro en la URL
                if (urlParams.toString() !== '') {
                    const carouselElement = document.getElementById('carousel-categoria');
                    if (carouselElement) {
                        // Pequeño delay para asegurar que la página se haya cargado completamente
                        setTimeout(function() {
                            carouselElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }, 300);
                    }
                }
            });



            // Ocultar el mensaje de éxito después de 5 segundos
            // setTimeout(function() {
            //     const successMessage = document.getElementById('success-message');
            //     if (successMessage) {
            //         successMessage.style.display = 'none';
            //     }
            // }, 5000);
        </script>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </body>

</x-app-layout>
