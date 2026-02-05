@section('name', 'Productos')

<x-app-layout>
    <section id="shop">
        <div class="container mx-auto">
            <!-- Top Filter -->
            <div class="flex flex-col md:flex-row justify-between items-center py-4 pt-16 md:pt-28"></div>
            <!-- Filter Toggle Button for Mobile -->

            <div class="flex flex-col md:flex-row">
                <!-- Filters -->
                <!-- Products List md:w-3/4 -->

                <div class="fixed bottom-10  right-14 floating-btn">
                    <button
                        class="bg-blue-500 hover:bg-blue-600
                                   text-white font-bold py-3 px-4
                                   rounded-full shadow-lg hover:shadow-xl
                                   transition duration-300 ease-in-out
                                   transform hover:scale-110 bounce relative"
                                   href="">
                        <a class="fas  fa-plus text-3xl" href="{{ route('NuevoProducto') }}"></a>
                        <!-- Font Awesome icon -->
                    </button>
                    <!-- Tooltip -->

                </div>
                <style>
                    /* Custom Bounce Animation */
                    .bounce {
                        animation: bounce 2s infinite;
                    }

                    @keyframes bounce {

                        0%,
                        20%,
                        50%,
                        80%,
                        100% {
                            transform: translateY(0);
                        }

                        40% {
                            transform: translateY(-15px);
                        }

                        60% {
                            transform: translateY(-7px);
                        }
                    }

                    /* Tooltip Styling */
                    .tooltip {
                        visibility: hidden;
                        width: 200px;

                        background-color: black;
                        color: #fff;
                        text-align: center;
                        border-radius: 6px;
                        padding: 5px;
                        position: absolute;
                        z-index: 1;
                        bottom: 100%;
                        /* Position the tooltip above the button */
                        left: 50%;
                        margin-left: -60px;
                        opacity: 0;
                        transition: opacity 0.3s;
                    }

                    /* Show Tooltip on Hover */
                    .floating-btn:hover .tooltip {
                        visibility: visible;
                        opacity: 1;
                    }
                </style>
                <div class="w-full p-4 bg-black text-gray-300 bg-opacity-50 shadow-md rounded-3xl">
                    <h1 class="text-center text-3xl uppercase font-bold my-4">Lista de Productos</h1>
                    @foreach ($categoriasConProductos as $categoria)
                        <div class="my-4">
                            <p class="text-3xl uppercase  
                                ">
                                {{ $categoria->nombre }}
                            </p>
                        </div>


                        <div
                            class="grid grid-cols-1 py-2 my-2 sm:grid-cols-2 lg:grid-cols-5 gap-4  
                            ">
                            @foreach ($categoria->productosPaginados as $producto)
                                <div class="p-4 rounded-lg shadow hover:bg-black hover:text-white">
                                    <img src="{{ asset('images/' . $producto->slug . '.jpg') }}"
                                        class="w-full object-cover mb-4 rounded-lg">
                                    <div class=" font-semibold mb-2">{{ $producto->nombre }}</div>

                                    <p class="my-2"></p>

                                    <div class="flex flex-wrap items-center ">

                                        <div class="py-5 flex w-2/3">
                                            <a href="{{ route('EditarProducto', $producto->slug) }}"
                                                class="bg-primary border border-transparent hover:bg-white text-center hover:border-primary text-gray-500 hover:text-primary font-semibold py-2 px-4 rounded-full w-full">
                                                Editar
                                            </a>
                                        </div>

                                        <div class="flex justify-end w-1/3 items-center text-black p-4">

                                            <form action="{{ route('EliminarProducto') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name='id_product' id='id_product'
                                                    value="{{ $producto->id }}">
                                                <button type="submit" class="text-gray-700 p-2">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </form>




                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
