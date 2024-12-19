@section('name', $category->slug)

<x-app-layout>

    <body>
        <!-- Shop -->
        <section id="shop">
            <div class="container mx-auto bg-black text-gray-300  bg-opacity-50 shadow-md rounded-3xl">
                <!-- Top Filter -->
                <div class="my-10 px-5">
                    <p
                        class=" text-5xl uppercase font-bold @if ($category->slug === 'Ligas') matemasie-thin @elseif ($category->slug === 'Banqueteria-y-Maquinas') kanit-regular @elseif ($category->slug === 'Funcional-CrossFit') font-mono-catalogo
                    @elseif ($category->slug === 'Agarres-y-Cojines') oswald @elseif ($category->slug === 'Fitness') pt-serif-bold @elseif ($category->slug === 'Refacciones') edu-vic-wa-nt-beginner 
                    @elseif ($category->slug === 'Yoga') caveat @elseif ($category->slug === 'Straps') rock-salt-regular @endif py-3">
                        {{ $category->nombre }}</p>
                </div>
                <div
                    class="flex flex-col md:flex-row my-10 
                    @if ($category->slug === 'Ligas') matemasie-thin @elseif ($category->slug === 'Banqueteria-y-Maquinas') kanit-regular @elseif ($category->slug === 'Funcional-CrossFit') font-mono-catalogo
                    @elseif ($category->slug === 'Agarres-y-Cojines') oswald @elseif ($category->slug === 'Fitness') pt-serif-bold @elseif ($category->slug === 'Refacciones') edu-vic-wa-nt-beginner 
                    @elseif ($category->slug === 'Yoga') caveat @elseif ($category->slug === 'Straps') rock-salt-regular @endif">

                    <!-- Filters -->
                    <div id="filters" class="w-full md:w-1/4 p-4  md:block">
                        <div class=" my-0  border-gray-line hidden md:block text-gray-400 font-sans  ">
                            <form action="{{ route('Categoria', ['Categoria' => $category->slug]) }}" method="GET">
                                <!-- Category Filter -->
                                <div class=" py-6 border-b border-gray-line">
                                    <h3 class="text-lg font-semibold my-2">Nombre</h3>
                                    <div class="space-y-2">
                                        <input type="text" id="nombre" name="nombre"
                                            class=" w-full text rounded-md p-1 text-black" placeholder="Nombre">
                                    </div>
                                </div>
                                <!-- Size Filter -->
                                <div class="py-4 border-b border-gray-line">
                                    <h3 class="text-lg font-semibold my-2">Precio</h3>
                                    <div class="space-y-2">
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
                                    </div>
                                </div>

                                <!-- Color Filter -->
                                <div class=" py-4">
                                    <h3 class="text-lg font-semibold my-2">Variación del producto</h3>
                                    <div class="space-y-2">
                                        <select type="text" id="variante" name="variante"
                                            class=" w-full text-black rounded-md p-1">
                                            <option>-</option>
                                            <option value="1">Variante</option>
                                            <option value="0">Sin variante</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Brand Filter -->
                                <div class="w-full flex justify-center items-center py-5">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-1 py-1 px-4 rounded-full">
                                        Filtrar
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Rating Filter -->
                        <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch"
                            class="block items-center px-4 py-2 text-sm font-medium text-center md:hidden text-white bg-black hover:text-black rounded-lg hover:bg-white "
                            type="button">Filtrar
                            <i class="fa-solid fa-caret-down px-1"></i>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownSearch"
                            class="absolute  z-10 m-2 w-60  origin-top-right text-xs rounded-md text-gray-600 font-sans bg-gray-100 bg-opacity-90 py-1 shadow-lg  hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <form action="{{ route('Categoria', ['Categoria' => $category->slug]) }}" method="GET">
                                <!-- Category Filter -->
                                <div class=" mx-2">
                                    <h3 class=" font-semibold my-2">Nombre</h3>
                                    <div class="space-y-2">
                                        <input type="text" id="nombre" name="nombre"
                                            class=" w-full text rounded-md p-1 text-black" placeholder="Nombre">
                                    </div>
                                </div>
                                <!-- Size Filter -->
                                <div class="mx-2">
                                    <h3 class=" font-semibold py-2">Precio</h3>
                                    <div class="space-y-2 font-semibold">
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
                                    </div>
                                </div>

                                <!-- Color Filter -->
                                <div class=" mx-2  py-2 ">
                                    <h3 class="font-semibold py-2">Variación del producto</h3>
                                    <div class="space-y-2">
                                        <select type="text" id="variante" name="variante"
                                            class=" w-full text-black p-1 rounded-md">
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
                    <div class="w-full md:w-3/4 p-4">
                        <!-- Products grid -->

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            <!-- Product 1 -->
                            @foreach ($products as $producto)
                                <div class=" p-4 rounded-lg shadow hover:bg-black hover:text-white">
                                    <img src="{{ asset('images/' . $producto->slug . '.jpg') }}"
                                        class="w-full object-cover mb-4 rounded-lg">
                                    <a href="{{ route('Producto', $producto->slug) }}"
                                        class=" font-semibold mb-2">{{ $producto->nombre }}</a>
                                    <p class=" my-2"></p>
                                    @if ($producto->variante)
                                        <div class="py-5 flex ">
                                            <a href="{{ route('Producto', $producto->slug) }}"
                                                class="bg-primary border border-transparent hover:bg-white text-center hover:border-primary text-gray-500 hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
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
                                            <input type="hidden" id="precio" name="precio"
                                                value="{{ $producto->precio }}">
                                            <div class="flex items-center mb-4">
                                                <span
                                                    class="text-lg font-bold font-sans text-primary">${{ $producto->precio }}.00</span>
                                                <!--span class="text-sm line-through ml-2">$24.99</span-->
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
                        <!-- Pagination -->
                        <div class="flex justify-end mt-8 mx-auto text-white font-sans">
                            <nav aria-label="Page navigation example ">
                                {{ $products->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </body>

</x-app-layout>
