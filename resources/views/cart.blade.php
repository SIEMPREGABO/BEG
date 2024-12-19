@section('name', 'Carrito')

<x-app-layout>
    @if ($errors->any())
        <div class=" sm:px-6 lg:px-8 xl:mx-40  lg:mx-10">
            <ul class="mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
                @foreach ($errors->all() as $error)
                    <div class="rounded-md flex m-2 items-center bg-blue-500 text-white text-sm font-bold px-4 py-1"
                        role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        <p>{{ $error }}</p>
                    </div>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class=" sm:px-6 lg:px-8 xl:mx-40  lg:mx-10" id="success-message">
            <div class=" mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
                <div class="rounded-md flex m-2 items-center bg-green-500 text-white text-sm font-bold px-4 py-1"
                    role="alert">
                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM7.146 13.854l-4.146-4.146a1 1 0 111.414-1.414L7 11.086l7.086-7.086a1 1 0 111.414 1.414l-8 8a1 1 0 01-1.414 0z" />
                    </svg>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="flex flex-col justify-center items-center min-h-screen">
        <div class="bg-black bg-opacity-50 w-full rounded-lg shadow-lg p-6 my-10 md:my-0 lg:max-w-6xl">
            <h1 class="text-2xl  font-bold mb-6">Carrito de compras</h1>

            @if (isset($carrito) && !empty($carrito))
                @php
                    $total = 0; // Variable para almacenar el total
                @endphp






                @foreach ($carrito as $index => $product)
                    @php
                        // Calcular el subtotal por producto
                        $subtotal = $product['precio'] * $product['cantidad'];
                        // Acumular el total
                        $total += $subtotal;
                    @endphp
                    <div class="md:flex  md:justify-between mb-4 text-md lg:text-xl text-white">

                        <div class="flex items-center ">
                            <!--img src="https://via.placeholder.com/80" alt="Product Image" class="mr-4"-->
                            <img src="{{ asset('images/' . $product['slug'] . '.jpg') }}" class=" mr-4 " height="80"
                                width="80">
                            <div>
                                <h2 class="font-bold ">{{ $product['nombre'] }}</h2>
                                @isset($product['details_array'])
                                    <p class="">{{ $product['details_array'] }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="flex items-center my-10 justify-between">
                            <div class="flex items-center">
                                <form action="{{ route('eliminar-del-carrito') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="id" name="id" value="{{ $product['id'] }}">
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <div class="mx-4">
                                    <input type="number" name="productos[{{ $index }}][cantidad]"
                                        id="cantidad-{{ $index }}" value="{{ $product['cantidad'] }}"
                                        class="w-16 text-center bg-black text-white bg-opacity-50 rounded-md"
                                        min="1" data-index="{{ $index }}"
                                        data-precio="{{ $product['precio'] }}">
                                </div>
                            </div>
                            <span class="font-bold text-white" id="subtotal-{{ $index }}">$
                                {{ number_format($subtotal, 2) }}
                            </span>
                        </div>
                    </div>
                @endforeach


                <hr class="my-4">
                @if (Auth::check())
                    @if (Auth::user()->mayorista === 1)
                        <div class="flex justify-between items-center md:text-sm py-1">
                            <span class=" text-gray-100">*Eres mayorista tu descuento se verá aplicado en tu pago*
                            </span>
                        </div>
                    @endif
                @endif

                <div class="flex justify-between items-center md:text-xl">
                    <span class="font-bold text-gray-100">Subtotal</span>
                    <span class="font-bold text-white" id="total">${{ number_format($total, 2)}}</span>
                    <!-- Mostrar el total acumulado -->
                </div>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('ProcesarPedido') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Procesar
                        pedido</a>
                </div>
            @else
                <div class="flex justify-center items-center">
                    <span class="font-bold">Tu carrito esta un poco vacío :(</span>

                </div>
            @endif
        </div>
    </div>
    @vite(['resources/js/cart.js'])

</x-app-layout>
