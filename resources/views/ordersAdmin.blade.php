@section('name', 'Pedidos')

<x-app-layout>
    <section class=" bg-black bg-opacity-50 my-12 rounded-md  antialiased md:my-16">
        <div class="mx-auto max-w-5xl">

            <div class="p-5 w-full">
                <h4 class="text-lg font-semibold  text-white text-center uppercase py-5 ">Lista de pedidos</h4>
                @if (isset($orders))
                    <div class="border rounded-md border-gray-line">
                        @foreach ($orders as $order)
                            <div class="md:flex w-full my-3 ">
                                <div class="w-full">
                                    <div
                                        class=" w-full rounded-md p-4 flex flex-wrap text-white justify-between leading-normal ">

                                        <!-- Fila 1 -->
                                        <div
                                            class="flex w-full items-center justify-between pb-2 mb-2 border-b border-gray-line">
                                            <div class="flex flex-col items-center w-full md:w-1/3">
                                                <p>Pedido</p>
                                                <p class="text-sm font-extralight ">
                                                    {{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</p>
                                            </div>


                                            <div class="flex flex-col items-center w-full md:w-1/3">
                                                <p>Código</p>
                                                @isset($order->code->code)
                                                    <p class="text-sm font-extralight"> {{ $order->code->code }}</p>
                                                @endisset
                                            </div>

                                            <div class="flex flex-col items-center w-full md:w-1/3">
                                                <p>Total</p>
                                                <p class="text-sm font-extralight"> ${{ $order->total }}</p>
                                            </div>



                                        </div>





                                        <div class="mt-10 w-full flex justify-center items-center font-bold">
                                            <h1 class="font-bold uppercase text-center"> Dirección</h1> &nbsp;

                                        </div>

                                        <!-- Fila 2 -->
                                        <div class="md:flex w-full items-center  md:justify-between md:my-3 md:py-3">




                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                <p> Estado</p>
                                                <p class="text-sm font-extralight">
                                                    {{ $order->address->estado }}
                                                </p>
                                            </div>

                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                <p> Municipio</p>
                                                <p class="text-sm font-extralight">
                                                    {{ $order->address->municipio }}</p>
                                            </div>

                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                <p> Colonia</p>
                                                <p class="text-sm font-extralight"> {{ $order->address->colonia }}</p>
                                                <p class="text-sm font-extralight">
                                                    CP {{ $order->address->cp }}
                                                </p>
                                            </div>



                                        </div>

                                        <div
                                            class="md:flex w-full md:items-center  md:my-3 md:py-3 justify-between mb-10 border-b border-gray-line">

                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                <p>Calle</p>
                                                <p class="text-sm font-extralight">{{ $order->address->calle }}</p>
                                            </div>

                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                <p>Número exterior</p>
                                                <p class="text-sm font-extralight">{{ $order->address->num_ext }}</p>
                                            </div>
                                            @isset($order->address->num_int)
                                                <div class="flex flex-col md:items-center md:p-0 p-2 w-full md:w-1/3">
                                                    <p>Número interior</p>
                                                    <p class="text-sm font-extralight">{{ $order->address->num_int }}</p>
                                                </div>
                                            @endisset
                                        </div>



                                        <!-- Fila 3 -->
                                        <div class="md:flex w-full md:items-center md:justify-between ">
                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full">
                                                <label for="orden-{{ $order->id }}" class="mr-2">Estado</label>
                                                <select id="orden-{{ $order->id }}"
                                                    name="orden-{{ $order->id }}"
                                                    onchange="cambiarEstado(this.value, {{ $order->id }})"
                                                    class="rounded-md p-1 border text-black border-gray-300">
                                                    <option value="En revision" @selected($order->state == 'En revision')>En revisión
                                                    </option>
                                                    <option value="Preparado" @selected($order->state == 'Preparado')>Preparando
                                                    </option>
                                                    <option value="Enviado" @selected($order->state == 'Enviado')>Enviado
                                                    </option>
                                                    <option value="En camino" @selected($order->state == 'En camino')>En camino
                                                    </option>
                                                    <option value="Entregado" @selected($order->state == 'Entregado')>Entregado
                                                    </option>
                                                </select>
                                            </div>

                                            @if ($order->user_id)
                                                <div class="flex flex-col md:items-center md:p-0 p-2 w-full ">
                                                    <p>Usuario</p>
                                                    @if ($order->user_id)
                                                        <p class="text-sm font-extralight"> {{ $order->user->email }}
                                                        </p>
                                                        <p class="text-sm font-extralight"> {{ $order->user->celular }}
                                                        </p>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="flex flex-col md:items-center md:p-0 p-2 w-full ">
                                                    <p>Contacto</p>
                                                    @if ($order->email)
                                                        <p class="text-sm font-extralight"> {{ $order->email }}</p>
                                                    @endif
                                                    @if ($order->celular)
                                                        <p class="text-sm font-extralight"> {{ $order->celular }}</p>
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="flex flex-col md:items-center md:p-0 p-2 w-full">
                                                <p>Fecha</p>
                                                <p class="text-sm font-extralight"> {{ $order->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            @foreach ($order->details_array as $details)
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6 px-8 py-4  rounded-lg">
                                    <!-- Imagen del producto -->
                                    <div class="flex items-center justify-center md:justify-start md:col-span-1">
                                        <img src="{{ asset('images/' . $details->product_attributes['slug'] . '.jpg') }}"
                                            class="h-16 w-16 object-cover rounded-lg">
                                    </div>

                                    <!-- Nombre del producto -->
                                    <div
                                        class="flex flex-col justify-center items-center md:items-start text-center md:text-left md:col-span-2">
                                        <div class="text-white font-bold">
                                            {{ $details->product_attributes['nombre'] }}
                                        </div>
                                        <div class="text-gray-300">
                                            {{ $details->quantity }}
                                            @if ($details->quantity > 1)
                                                Piezas
                                            @else
                                                Pieza
                                            @endif
                                        </div>
                                        <div class="text-gray-300">{{ $details->description }}</div>
                                    </div>

                                    <!-- Total del detalle -->
                                    <div
                                        class="flex flex-col items-center md:items-end text-center md:text-right md:col-span-1">
                                        <div class="text-white font-bold flex md:py-2">
                                            Costo
                                            <p class="text-sm font-extralight px-2">${{ $details->total }}</p>
                                        </div>
                                        <div class="text-white flex md:py-2">
                                            Envío
                                            <p class="text-sm font-extralight px-2">${{ $details->costo_envio }}</p>
                                        </div>
                                        <div class="text-white text-sm font-extralight md:py-2">
                                            {{ $details->proveedor }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </section>
</x-app-layout>
