@section('name', 'Pedidos')

<x-app-layout>
    @if ($errors->any())
        <div class="sm:px-6 lg:px-8 xl:mx-40 lg:mx-10">
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
        <div class="sm:px-6 lg:px-8 xl:mx-40 lg:mx-10" id="success-message">
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
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

    <section class="bg-black bg-opacity-50 py-8 my-12 rounded-md antialiased md:py-32 md:my-16">
        <div class="mx-auto max-w-5xl px-4 sm:px-6">
            <h2 class="text-xl font-semibold text-gray-500 dark:text-white sm:text-2xl">Mis pedidos</h2>

            <div class="mt-6 sm:mt-8">
                <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                    @foreach ($orders as $order)
                        <!-- Contenedor de la orden adaptado a móvil -->
                        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 mb-6 p-4  rounded-lg">
                            <!-- ID de la orden -->
                            <div class="flex flex-col items-start sm:col-span-1">
                                <div class="text-white text-center font-bold">ID:</div>
                                <div class="text-white">{{ $order->id }}</div>
                            </div>

                            <!-- Estado de la orden -->
                            <div class="flex flex-col items-start sm:col-span-1">
                                <div class="text-white text-center font-bold">Estado:</div>
                                <div class="text-white">{{ $order->state }}</div>
                            </div>

                            <!-- Fecha de creación -->
                            <div class="flex flex-col items-start sm:col-span-1">
                                <div class="text-white text-center font-bold">Fecha:</div>
                                <div class="text-white">{{ $order->created_at }}</div>
                            </div>

                            <!-- Total -->
                            <div class="flex flex-col items-start sm:col-span-1">
                                <div class="text-white text-center font-bold">Total:</div>
                                <div class="text-white">${{ $order->total }}</div>
                            </div>
                            @if($order->code_id)
                            
                            <div class="flex flex-col items-start sm:col-span-1">
                                <div class="text-white text-center font-bold">Código</div>
                                <div class="text-white">{{ $order->code->code }}</div>
                            </div>
                        @endif
                            
                        </div>

                        <!-- Detalles de la orden adaptados a móvil -->
                        @foreach ($order->details_array as $details)
                            <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 mb-6 p-4  rounded-lg">
                                <!-- Imagen del producto -->
                                <div class="flex items-center sm:col-span-1">
                                    <img src="{{ asset('images/' . $details->product_attributes['slug'] . '.jpg') }}"
                                        class="h-16 w-16 object-cover rounded-lg">
                                </div>

                                <!-- Nombre del producto -->
                                <div class="flex flex-col items-start sm:col-span-2">
                                    <a href="{{ route('Producto', $details->product_attributes['slug']) }}"
                                        class="hover:underline text-white font-bold">
                                        {{ $details->product_attributes['nombre'] }}
                                    </a>
                                    <div class="text-gray-300">{{ $details->quantity }} Piezas</div>
                                    <div class="text-gray-300">{{ $details->description }}</div>
                                </div>

                                <!-- Total del detalle -->
                                <div class="flex flex-col items-end sm:col-span-1">
                                    <div class="text-white font-bold">Costo ${{ $details->total }}</div>
                                    <div class="text-white font-bold">Envío ${{ $details->costo_envio }}</div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    
</x-app-layout>
