@section('name', 'Pedidos')

<x-app-layout>
   <x-alert-messages />

    <section class="bg-black bg-opacity-50 py-8 my-12 rounded-md antialiased md:py-16 md:my-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <h2 class="h1-neon text-center mb-8">Mis Pedidos</h2>

            <div class="mt-6 sm:mt-8 space-y-8">
                @foreach ($orders as $order)
                    <!-- Contenedor de la orden con efecto neón -->
                    <div class="border-neon-green box-shadow-neon-green rounded-lg p-6 bg-black bg-opacity-70 transition-all duration-300 hover:box-shadow-neon-green zoom-item">
                        <!-- Header de la orden -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6 pb-4 border-b border-neon-green">
                            <!-- ID de la orden -->
                            <div class="flex flex-col items-start">
                                <div class="subtitle-neon text-sm mb-1">ID de Pedido</div>
                                <div class="text-color-neon text-lg font-bold">#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</div>
                            </div>

                            <!-- Estado de la orden -->
                            <div class="flex flex-col items-start">
                                <div class="subtitle-neon text-sm mb-1">Estado</div>
                                <div class="botones-neon-green inline-flex px-3 py-1 text-sm rounded-full">
                                    {{ $order->state }}
                                </div>
                            </div>

                            <!-- Fecha de creación -->
                            <div class="flex flex-col items-start">
                                <div class="subtitle-neon text-sm mb-1">Fecha</div>
                                <div class="text-white font-semibold">{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</div>
                            </div>

                            <!-- Total -->
                            <div class="flex flex-col items-start md:items-end">
                                <div class="subtitle-neon text-sm mb-1">Total del Pedido</div>
                                <div class="text-color-neon text-2xl font-bold">${{ number_format($order->total, 2) }}</div>
                            </div>
                        </div>

                        <!-- Código de descuento si existe -->
                        @if($order->code_id)
                        <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-700">
                            <svg class="w-5 h-5 svg-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            <span class="subtitle-neon text-sm">Código de descuento aplicado:</span>
                            <span class="text-color-neon font-bold">{{ $order->code->code }}</span>
                        </div>
                        @endif

                        <!-- Detalles de productos -->
                        <div class="space-y-4">
                            <h3 class="text-white-neon text-lg font-semibold mb-4">Productos del Pedido</h3>
                            @foreach ($order->details_array as $details)
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 p-4 bg-black bg-opacity-40 rounded-lg border border-gray-700 hover:border-neon-green transition-all duration-300">
                                    <!-- Imagen del producto -->
                                    <div class="md:col-span-2 flex justify-center md:justify-start">
                                        <img src="{{ asset('images/' . $details->product_attributes['slug'] . '.jpg') }}"
                                            class="h-20 w-20 object-cover rounded-lg border border-gray-600 hover:border-neon-green transition-all duration-300"
                                            alt="{{ $details->product_attributes['nombre'] }}">
                                    </div>

                                    <!-- Información del producto -->
                                    <div class="md:col-span-6 flex flex-col justify-center">
                                        <a href="{{ route('Producto', $details->product_attributes['slug']) }}"
                                            class="text-white font-bold text-lg hover:text-color-neon transition-colors duration-300 mb-2">
                                            {{ $details->product_attributes['nombre'] }}
                                        </a>
                                        <div class="flex items-center gap-4 text-sm">
                                            <span class="text-gray-400">
                                                <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                                {{ $details->quantity }} Pieza{{ $details->quantity > 1 ? 's' : '' }}
                                            </span>
                                        </div>
                                        @if($details->description)
                                        <div class="text-gray-400 text-sm mt-1">{{ $details->description }}</div>
                                        @endif
                                    </div>

                                    <!-- Costos -->
                                    <div class="md:col-span-4 flex flex-col justify-center items-start md:items-end space-y-2">
                                        <div class="flex items-center gap-2">
                                            <span class="text-gray-400 text-sm">Costo:</span>
                                            <span class="text-color-neon font-bold text-lg">${{ number_format($details->total, 2) }}</span>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <span class="text-gray-400 text-sm">Envío:</span>
                                            <span class="text-white font-semibold">${{ number_format($details->costo_envio, 2) }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                @if($orders->isEmpty())
                    <div class="text-center py-16">
                        <svg class="w-24 h-24 mx-auto mb-4 svg-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <h3 class="h4-neon mb-4">No tienes pedidos aún</h3>
                        <p class="text-gray-400 mb-6">Comienza a explorar nuestros productos</p>
                        <a href="{{ route('Producto', 'Ligas') }}" class="botones-neon-green zoom-button inline-flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Ver Catálogo
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </section>

    
</x-app-layout>
