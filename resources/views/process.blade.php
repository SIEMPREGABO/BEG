@section('name', 'Pedido')

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
    <section class=" bg-black bg-opacity-50 py-8 my-12 rounded-md  antialiased  md:py-32 md:my-16">
        <form action="{{ route('RealizarPedido') }}" method="POST" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            @csrf
            <div class="mx-auto max-w-3xl">
                <h2 class="text-xl font-semibold text-gray-500 dark:text-white sm:text-2xl">Resumen de compra</h2>

                <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8 dark:border-gray-700 sm:mt-8">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-white">Información de entrega</h4>

                    @if (isset($addresses))
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($addresses as $address)
                                <div class="my-3 w-full" id='{{ $address->id }}'>
                                    <div class="w-full lg:max-w-full">
                                        <div
                                            class="bg-white rounded-md px-4 py-4 w-full flex flex-col justify-between leading-normal">
                                            <div class="">
                                                <p class="text-base text-gray-600 flex items-center mb-1">
                                                    <input type="radio" class="justify-start"
                                                        id="direccion_seleccionada" name="direccion_seleccionada"
                                                        value="{{ $address->id }}" />
                                                    &nbsp;
                                                    {{ $address->estado }}, {{ $address->municipio }}
                                                </p>
                                                <div class="text-black text-sm mb-1">
                                                    Colonia {{ $address->colonia }} <i
                                                        class="text-gray-900 leading-none my-1">CP
                                                        {{ $address->cp }}</i>
                                                </div>
                                                <p class="text-black text-sm mb-1">
                                                    Calle '{{ $address->calle }}'
                                                </p>
                                            </div>
                                            <div class="flex flex-wrap items-center">
                                                <div class="text-sm w-1/2">
                                                    <p class="text-gray-600">Num exterior #{{ $address->num_ext }}</p>
                                                    <p class="text-gray-600">Num interior #{{ $address->num_int }}</p>
                                                </div>
                                                <div class="flex justify-end w-1/2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-8 py-2">
                            <button
                                class=" flex flex-wrap justify-start items-center rounded-full text-white bg-blue-500  border-blue-500  p-2"
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
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="estadoEnvio" name="estadoEnvio" onchange="cambiarSelectEnvio()"
                                        value="{{ old('estadoEnvio') }}">
                                        <option value="0">Selecciona un estado</option>
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
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="municipioEnvio" name="municipioEnvio" value="{{ old('municipioEnvio') }}">
                                        <option value="0">-
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
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="estadoEnvio" name="estadoEnvio" onchange="cambiarSelectEnvio()"
                                        value="{{ old('estadoEnvio') }}">
                                        <option value="0">Selecciona un estado</option>
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
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="municipioEnvio" name="municipioEnvio"
                                        value="{{ old('municipioEnvio') }}">
                                        <option value="0">-</option>
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
                

                <div class="mt-6 sm:mt-8">
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
                                                <a href="#"
                                                    class="hover:underline">{{ $product['nombre'] }}</a>
                                                @isset($product['details_array'])
                                                    <p class="text-white text-xs">({{ $product['details_array'] }})</p>
                                                @endisset
                                            </div>

                                        </td>

                                        <td class="p-4 text-base font-normal text-gray-700 dark:text-white">
                                            x{{ $product['cantidad'] }}</td>

                                        <td class="p-4 text-right text-base font-bold text-gray-700 dark:text-white">
                                            ${{ $product['precio'] }}
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 space-y-6">
                        <h4 class="text-xl font-semibold text-gray-500 dark:text-white">Resumen de compra</h4>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4 py-4">
                                    <dt class="text-gray-500 dark:text-gray-400">Precio del carrito</dt>
                                    <dd class="text-base font-medium text-gray-500 dark:text-white">
                                        ${{ $subtotal }}</dd>
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
                                class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            </dl>
                        </div>



                        <div class="mb-8 flex flex-col">
                            <button type="submit"
                                class="mx-auto rounded-full bg-blue-500 border border-blue-500 text-white px-4 py-2">
                                Procesar pedido
                            </button>
                        </div>




                    </div>
                </div>
            </div>
        </form>
    </section>




   
</x-app-layout>
