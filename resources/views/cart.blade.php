@section('name', 'Carrito')

<x-app-layout>
    <x-alert-messages />

    @if (isset($carrito) && !empty($carrito))
        <div class="flex justify-center mt-8">
            <h1 class="text-3xl  font-bold mb-6 text-color-neon uppercase">Carrito </h1>
        </div>
    @endif
    <div class="flex flex-col justify-center items-center min-h-screen">
        <div class="bg-black bg-opacity-50 w-full rounded-lg shadow-lg px-6 md:my-0 lg:max-w-6xl">


            @if (isset($carrito) && !empty($carrito))
                {{-- <h1 class="text-3xl  font-bold mb-6 text-color-neon uppercase">Carrito de compras</h1> --}}
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
                            <img src="{{ asset('images/' . $product['slug'] . '.jpg') }}"
                                class=" mr-4 border-neon-green rounded" height="80" width="80">
                            <div>
                                <h2 class="font-bold text-neon">{{ $product['nombre'] }}</h2>
                                @isset($product['details_array'])
                                    <p class="">{{ $product['details_array'] }}</p>
                                @endisset
                            </div>
                        </div>
                        <div class="flex items-center my-10 justify-between gap-4">
                            <div class="flex items-center">
                                <form action="{{ route('eliminar-del-carrito') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" id="id" name="id" value="{{ $product['id'] }}">
                                    <button type="submit" class="text-neon-green">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="var(--neon-green)"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M18 6l-12 12" />
                                            <path d="M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                                <div class="mx-4">
                                    <input type="number" name="productos[{{ $index }}][cantidad]"
                                        id="cantidad-{{ $index }}" value="{{ $product['cantidad'] }}"
                                        class="w-16 text-center bg-black text-white bg-opacity-50 rounded-md"
                                        min="1" max="1000" data-index="{{ $index }}">
                                </div>
                            </div>
                            <span class="font-bold text-white" style="min-width: 90px"
                                id="subtotal-{{ $index }}">$
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
                    <span class="font-bold text-gray-100 text-neon">Subtotal</span>
                    <span class="font-bold text-white" id="total">${{ number_format($total, 2) }}</span>
                    <!-- Mostrar el total acumulado -->
                </div>
                <div class="flex justify-center mt-6">
                    <a href="{{ route('ProcesarPedido') }}" class="botones-neon-green hover:scale-105">Procesar
                        pedido</a>
                </div>
            @else
                <div class="flex justify-center items-center flex-col text-neon space-y-6">
                    {{-- <span class="font-bold">Tu carrito esta un poco vacío :(</span> --}}
                    <a href="{{ route('Categoria', 'Ligas') }}" class="text-xl ">Visita nuestro catálogo!</a>
                    <img src="{{ asset('images/empty_cart.png') }}" alt="Carrito Vacío" class="w-64 h-64"
                        style="mask-image: radial-gradient(circle at center, black 5%, transparent 90%); -webkit-mask-image: radial-gradient(circle at center, black 5%, transparent 90%);">

                </div>
            @endif
        </div>
    </div>


</x-app-layout>
