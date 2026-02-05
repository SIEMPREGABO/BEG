@section('name', 'Pedido')

<x-app-layout>
    <x-alert-messages />
    <section class=" bg-black bg-opacity-50 py-10 rounded-md  antialiased ">
        <form action="{{ route('RealizarPedido') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto max-w-3xl">
                <h2 class="h4-neon">Resumen de compra</h2>

                <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                    <h4 class="h4-neon">Información de entrega</h4>

                    @if (isset($addresses))
                        <div class="flex flex-wrap w-full justify-center mb-4">
                            @foreach ($addresses as $address)
                                <div class="px-3 my-3 w-full" id='{{ $address->id }}'>
                                    <div class="w-full lg:max-w-full">
                                        <div
                                            class="border-neon-green rounded-md px-4 py-4 w-full flex flex-col justify-between leading-normal">
                                            <div class="">
                                                <p class="text-base text-white flex items-center mb-4">
                                                    <input type="radio" class="justify-start"
                                                        id="direccion_seleccionada" name="direccion_seleccionada"
                                                        value="{{ $address->id }}" />
                                                    &nbsp;
                                                    {{ $address->estado }}, {{ $address->municipio }}
                                                    &nbsp;
                                                    {{ $address->cp }}
                                                </p>

                                                <div class="flex mb-4" style="justify-content: space-around">
                                                    <div class="flex flex-col justify-center text-center">

                                                        <p class="text-gray-500 text-xs ">
                                                            Colonia

                                                        </p>
                                                        <p class="text-white">{{ $address->colonia }}</p>
                                                    </div>
                                                    <div class="flex flex-col justify-center text-center">
                                                        <p class="text-gray-500 text-xs ">

                                                            Calle

                                                        </p>
                                                        <p class="text-white">
                                                            '{{ $address->calle }}'

                                                        </p>
                                                    </div>

                                                    <div class="flex flex-col justify-center text-center">
                                                        <p class="text-gray-500 text-xs">

                                                            Num exterior
                                                        </p>
                                                        <p class="text-white">
                                                            #{{ $address->num_ext }}
                                                        </p>
                                                    </div>

                                                    @if ($address->num_int)
                                                        <div class="flex flex-col justify-center text-center">
                                                            <p class="text-gray-500 text-xs ">
                                                                Num interior
                                                            </p>
                                                            <p class="text-white">
                                                                #{{ $address->num_int }}
                                                            </p>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- <div class="text-black text-sm mb-1">
                                                    Colonia {{ $address->colonia }} <i
                                                        class="text-gray-900 leading-none my-1">CP
                                                        {{ $address->cp }}</i>
                                                </div>
                                                <p class="text-black text-sm mb-1">
                                                    Calle '{{ $address->calle }}'
                                                </p> --}}
                                            </div>
                                            {{-- <div class="flex flex-wrap items-center">
                                                <div class="text-sm w-1/2">
                                                    <p class="text-gray-600">Num exterior #{{ $address->num_ext }}</p>
                                                    <p class="text-gray-600">Num interior #{{ $address->num_int }}</p>
                                                </div>
                                                <div class="flex justify-end w-1/2">
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-8 py-2">
                            <button
                                class="botones-neon-green"
                                type="button" onclick="mostrarFormularioDireccion()">
                                <i class="fa-solid fa-plus p-1"></i>
                                <p>Colocar una dirección diferente</p>
                            </button>
                        </div>



                        <div id="addDirection" class="hidden">
                            <div class="mb-4 md:flex md:justify-between ">
                                <div class="mb-4 md:mb-0 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold dark:text-white" for="estadoEnvio">
                                        Estado
                                    </label>
                                    <select class="" id="estadoEnvio" name="estadoEnvio"
                                        onchange="cambiarSelectEnvio()" value="{{ old('estadoEnvio') }}">
                                        <option value="">Selecciona un estado</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>

                                <div class="mb-4 md:mb-0 w-full lg:w-1/3 md:ml-2">
                                    <label class="" for="municipioEnvio">
                                        Municipio/Delegación
                                    </label>
                                    <select class="" id="municipioEnvio" name="municipioEnvio"
                                        value="{{ old('municipioEnvio') }}">
                                        <option value="">-
                                    </select>
                                </div>

                                <div class="mb-4 md:mb-0 md:ml-2 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="cp">
                                        Código Postal
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="cp" name="cp" type="text" placeholder="CP"
                                        value="{{ old('cp') }}" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">
                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="colonia">
                                        Colonia
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="colonia" name="colonia" type="text" placeholder="Colonia"
                                        value="{{ old('colonia') }}" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="calle">
                                        Calle
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="calle" name="calle" type="text" placeholder="Calle"
                                        value="{{ old('calle') }}" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">

                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_ext">
                                        Número Exterior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_ext" name="num_ext" type="text" placeholder="Número Exterior"
                                        value="{{ old('num_ext') }}" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_int">
                                        Número Interior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_int" name="num_int" type="text" placeholder="Número Interior"
                                        value="{{ old('num_int') }}" />
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="">
                            <div class="mb-4 md:flex md:justify-between ">
                                <div class="mb-4 md:mb-0 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold dark:text-white" for="estadoEnvio">
                                        Estado
                                    </label>
                                    <select class="" id="estadoEnvio" name="estadoEnvio"
                                        onchange="cambiarSelectEnvio()" value="{{ old('estadoEnvio') }}">
                                        <option value="">Selecciona un estado</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>

                                <div class="mb-4 md:mb-0 w-full lg:w-1/3 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold dark:text-white" for="municipioEnvio">
                                        Municipio/Delegación
                                    </label>
                                    <select class="" id="municipioEnvio" name="municipioEnvio"
                                        value="{{ old('municipioEnvio') }}">
                                        <option value="">-</option>
                                    </select>
                                </div>

                                <div class="mb-4 md:mb-0 md:ml-2 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="cp">
                                        Código Postal
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="cp" name="cp" type="text" placeholder="CP"
                                        value="{{ old('cp') }}" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">
                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="colonia">
                                        Colonia
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="colonia" name="colonia" type="text" placeholder="Colonia"
                                        value="{{ old('colonia') }}" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="calle">
                                        Calle
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="calle" name="calle" type="text" placeholder="Calle"
                                        value="{{ old('calle') }}" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">

                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_ext">
                                        Número Exterior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_ext" name="num_ext" type="text" placeholder="Número Exterior"
                                        value="{{ old('num_ext') }}" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_int">
                                        Número Interior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_int" name="num_int" type="text" placeholder="Número Interior"
                                        value="{{ old('num_int') }}" />
                                </div>
                            </div>


                        </div>
                    @endif



                </div>

                @if (!Auth::check())
                    <div class="mt-6 space-y-4 border-b  border-gray-200 pb-8 dark:border-gray-700 sm:mt-8">
                        <h4 class="h4-neon">Forma de contacto</h4>

                        <div class="mb-6 md:flex md:justify-center">
                            <div class="mb-4 md:mb-0 md:w-1/2 ">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="emailInvitado">
                                    Email
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="emailInvitado" name="emailInvitado" type="text" placeholder="Email"
                                    value="{{ old('emailInvitado') }}" />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="celularInvitado">
                                    Celular
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="celularInvitado" name="celularInvitado" type="text" placeholder="Celular"
                                    value="{{ old('celularInvitado') }}" />
                            </div>
                        </div>
                    </div>
                @endif

                <div class="mt-6 sm:mt-8">
                    <h4 class="h4-neon">Resumen de compra</h4>

                    <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">

                        <table class="w-full text-left font-medium text-gray-500 dark:text-white md:table-fixed">
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">

                                @foreach ($carrito as $product)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 md:w-[384px]">
                                            <div class="flex items-center gap-4">
                                                <div class="flex items-center aspect-square w-20 h-20 shrink-0">
                                                    <img src="{{ asset('images/' . $product['slug'] . '.jpg') }}"
                                                        class="h-auto w-full max-h-full ">
                                                </div>
                                                <p class="text-color-neon">{{ $product['nombre'] }}</p>
                                                @isset($product['details_array'])
                                                    <p class="text-white text-xs">({{ $product['details_array'] }})</p>
                                                @endisset
                                            </div>

                                        </td>

                                        <td class="color-green">
                                            x&nbsp;{{ $product['cantidad'] }}
                                        </td>

                                        <td class="p-4 text-right text-base font-bold text-gray-700 dark:text-white">
                                            ${{ number_format($product['precio'], 2) }}
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4 py-4">
                                    <dt class="text-color-neon">Precio del carrito</dt>
                                    <dd class="text-base font-medium text-gray-500 dark:text-white">
                                        ${{ number_format($subtotal, 2) }}</dd>
                                </dl>



                                <!--dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Descuentos</dt>
                                    <dd class="text-base font-medium text-green-500">
                                        <p id="descuento" name="descuento">-$</p>
                                    </dd>
                                </dl-->

                                <!--dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                    <dd class="text-base font-medium text-gray-500 dark:text-white">$99</dd>
                                </dl-->

                                <!--dl class="flex items-center justify-between gap-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Envío</dt>
                                    <dd class="text-base font-medium text-gray-500 dark:text-white">$???
                                    </dd>
                                </dl-->
                                <!--form id="form-descuento" method="get">
                                -->
                                <div class="flex flex-wrap ">
                                    <div class="flex justify-center items-center">
                                        <input type="text" class="rounded-md p-2 text-xs"
                                            placeholder="Código de descuento" name="Codigo" id="Codigo">
                                    </div>
                                    <div class="flex justify-center items-center px-3 ">
                                        <p class=" text-sm text-white">¿Tienes código de descuento? Agregalo aquí</p>
                                        <!--button type="button" id="aplicar-descuento"
                                            class="btn rounded-md text-xs text-center text-white bg-black p-1">Aplicar</button-->
                                    </div>
                                </div>
                                <!--/form-->

                            </div>

                            <!--dl
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-lg font-bold text-gray-500 dark:text-white">Total</dt>
                                <dd class="text-lg font-bold text-white">
                                    <p class="text-white font-bold" id="totalView" name="totalView">
                                        $</p>
                                </dd>
                                <input type="hidden" name="total" id='total' value="" />
                            </dl-->


                            <dl
                                class="flex items-center justify-between gap-4  border-gray-200 pt-2 dark:border-gray-700">
                            </dl>
                        </div>



                        <div class="mb-8 flex justify-center">
                            <button type="submit" class="botones-neon-green rounded flex text-center justify-center">
                                Procesar pedido
                            </button>
                        </div>




                    </div>
                </div>
            </div>
        </form>
    </section>





</x-app-layout>
