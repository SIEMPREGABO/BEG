@section('name', 'Perfil')

<x-app-layout>


    <div class="mx-auto">
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
        <div class="flex justify-center px-6  {{ $errors->any() ? 'py-6' : 'py-24' }}">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">

                <div class="w-full  bg-black bg-opacity-50   p-5 rounded-lg  text-white">
                    
                    
                    <h3 class="py-4 text-2xl text-center text-white dark:text-white uppercase font-bold">Actualiza la
                        información de tu cuenta
                    </h3>

                    <form class="px-8 pt-6 pb-8 mb-4 rounded " method="POST" action="{{ route('ModificarPerfil') }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 md:flex md:justify-between ">
                            <div class="mb-4 md:mb-0 w-full lg:w-1/3">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="nombre_pila">
                                    Nombre (s)
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="nombre_pila" name="nombre_pila" type="text" placeholder="Nombre"
                                    value="{{ Auth::user()->nombre_pila }}" />
                            </div>
                            <div class="mb-4 md:mb-0 md:ml-2 w-full lg:w-1/3">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="apellido_paterno">
                                    Apellido Paterno
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="apellido_paterno" name="apellido_paterno" type="text"
                                    value="{{ Auth::user()->apellido_paterno }}" placeholder="Apellido Paterno" />
                            </div>
                            <div class="mb-4 md:mb-0 md:ml-2 w-full lg:w-1/3">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="apellido_materno">
                                    Apellido Materno
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="apellido_materno" name="apellido_materno" type="text"
                                    placeholder="Apellido Materno" value="{{ Auth::user()->apellido_materno }}" />
                            </div>
                        </div>

                        <div class="mb-4 md:flex md:justify-center">

                            <div class="mb-4 md:mb-0 md:w-1/2 ">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="email">
                                    Correo Electrónico
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="email" name="email" type="text" placeholder="tu@example.com"
                                    value="{{ Auth::user()->email }}" disabled />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="celular">
                                    Número Celular
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="celular" name="celular" type="text" placeholder="Celular"
                                    value="{{ Auth::user()->celular }}" />
                            </div>
                        </div>

                        <div class="mb-4 md:flex md:justify-center">
                            <div class="mb-4 md:mb-0 md:w-1/3 ">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="current_password">
                                    Contraseña Actual
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="current_password" name="current_password" type="password"
                                    placeholder="********" />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/3 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="password">
                                    Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password" name="password" type="password" placeholder="********" />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/3 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white"
                                    for="password_confirmation">
                                    Confirmar Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="********" />
                            </div>
                        </div>
                        <div class=" text-center">
                            <div class="w-full flex flex-col items-center pt-2">
                                <button type="submit"
                                    class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                    Actualizar información
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr class="mb-8  border-t" />

                    <h3 class="py-4 text-2xl text-center text-white dark:text-white uppercase font-bold">mis
                        direcciones
                    </h3>
                    <div class="flex flex-wrap w-full justify-center mb-4">
                        @forelse($addresses as $address)
                            <div class="md:w-1/2 px-3 my-3 w-full" id='{{ $address->id }}'>
                                <div class=" w-full lg:max-w-full md:flex md:justify-center ">
                                    <div
                                        class="bg-white rounded-md px-4 py-4 w-full flex flex-col justify-between leading-normal">
                                        <div class="">
                                            <p class="text-base text-gray-600 flex items-center mb-1">
                                                <i class="fa-solid fa-location-dot"></i>&nbsp;
                                                {{ $address->estado }}, {{ $address->municipio }}
                                            </p>

                                            <div class="text-black text-sm mb-1"> Colonia {{ $address->colonia }} <i
                                                    class="text-gray-900 leading-none my-1">CP {{ $address->cp }}</i>
                                            </div>
                                            <p class="text-black text-sm mb-1">

                                                Calle '{{ $address->calle }}'

                                            </p>
                                        </div>
                                        <div class="flex flex-wrap items-center">
                                            <div class="text-sm w-1/2">

                                                <p class="text-gray-600">Num exterior #{{ $address->num_ext }}</p>
                                                <p class="text-gray-600"> Num
                                                    interior #{{ $address->num_int }}</p>
                                            </div>
                                            <div class="flex justify-end w-1/2">
                                                <button class="fa-solid fa-lg fa-pen-to-square  text-gray-700 p-1"
                                                    onclick="openEditModalAddress({{ $address->id }},'{{ $address->estado }}','{{ $address->municipio }}','{{ $address->colonia }}',{{ $address->cp }},'{{ $address->calle }}',{{ $address->num_ext }},{{ $address->num_int }})  "
                                                    aria-expanded="true"></button>
                                                <form action="{{ route('EliminarDireccion') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name='id_address' id='id_address'
                                                        value="{{ $address->id }}">
                                                    <button type="submit" class="text-gray-700 p-2">
                                                        <i class="fa-solid fa-trash fa-lg"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3 class="py-4 text-lg text-start text-white dark:text-white  ">No tienes direcciones
                                registradas
                            </h3>
                        @endforelse
                    </div>

                    <div class="mb-8">
                        <button
                            class=" flex flex-wrap justify-start items-center rounded-full bg-blue-500  border-blue-500  p-2"
                            id="addDirectionButton">
                            <i class="fa-solid fa-plus p-1"></i>
                            <p>Agregar dirección</p>
                        </button>
                    </div>

                    <div id="addDirection" class="hidden">
                        <form action="{{ route('GuardarDireccion') }}" class="px-8 pt-6 pb-8 mb-4   rounded"
                            method="POST" name="direccionform">
                            @csrf


                            <div class="mb-4 md:flex md:justify-between ">
                                <div class="mb-4 md:mb-0 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold dark:text-white" for="estado">
                                        Estado
                                    </label>
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="estado" name="estado" onchange="cambiarSelect()">
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
                                    <label class="block mb-2 text-sm font-bold dark:text-white" for="municipio">
                                        Municipio/Delegación
                                    </label>
                                    <select
                                        class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                        id="municipio" name="municipio">
                                        <option value="0">-
                                    </select>
                                </div>

                                <div class="mb-4 md:mb-0 md:ml-2 w-full lg:w-1/3">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="cp">
                                        Código Postal
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="cp" name="cp" type="text" placeholder="CP" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">
                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="colonia">
                                        Colonia
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="colonia" name="colonia" type="text" placeholder="Colonia" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="calle">
                                        Calle
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="calle" name="calle" type="text" placeholder="Calle" />
                                </div>
                            </div>

                            <div class="mb-6 md:flex md:justify-center">

                                <div class="mb-4 md:mb-0 md:w-1/2 ">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_ext">
                                        Número Exterior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_ext" name="num_ext" type="text"
                                        placeholder="Número Exterior" />
                                </div>
                                <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_int">
                                        Número Interior
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_int" name="num_int" type="text"
                                        placeholder="Número Interior" />
                                </div>
                            </div>
                            <div class=" text-center">
                                <div class="w-full flex flex-col items-center pt-2">
                                    <button type="submit"
                                        class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                        Agregar dirección
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <hr class="mb-8 border-t " />

                    <h3 class="py-4 text-2xl text-center text-white dark:text-white uppercase font-bold">mis tarjetas
                    </h3>
                    <div class="flex flex-wrap w-full justify-center mb-4">
                        @forelse($cards as $card)
                            <div class="md:w-1/3 px-3 my-3 w-full">
                                <div class=" w-full lg:max-w-full lg:flex ">
                                    <div
                                        class="bg-white w-full rounded-md p-4  flex flex-col justify-between leading-normal ">
                                        <div class=" ">
                                            <p class="text-sm text-gray-600 flex items-center">
                                                <i class="fa-solid fa-lock"></i>&nbsp
                                                **** ****
                                                **** {{ $card->last_digits }}
                                            </p>

                                            <div class="text-gray-900 font-bold text-xl mb-2"> </div>
                                            <p class="text-gray-700 text-base">
                                                <strong>FDV:</strong>
                                                {{ $card->mes }}
                                                / {{ $card->anio }}<br>
                                            </p>
                                        </div>
                                        <div class="flex flex-wrap items-center ">

                                            <div class="text-sm w-1/2">
                                                <p class="text-gray-900 leading-none">Owner</p>
                                                <p class="text-gray-600">{{ $card->owner }}</p>
                                            </div>
                                            <div class="flex justify-end w-1/2">
                                                <button class="fa-solid fa-lg fa-pen-to-square  text-gray-700 p-1"
                                                    onclick="openEditModal({{ $card->id }},'{{ $card->last_digits }}','{{ $card->owner }}','{{ $card->mes }}','{{ $card->anio }}')  "
                                                    aria-expanded="true"></button>
                                                <form action="{{ route('EliminarTarjeta') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name='id_card' id='id_card'
                                                        value="{{ $card->id }}">
                                                    <button type="submit" class="text-gray-700 p-2">
                                                        <i class="fa-solid fa-trash fa-lg"></i>
                                                    </button>
                                                </form>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h3 class="py-4 text-lg text-start text-white dark:text-white  ">No tienes tarjetas
                                registradas
                            </h3>
                        @endforelse
                    </div>

                    <div class="mb-4">
                        <button
                            class=" flex flex-wrap justify-start items-center rounded-full bg-blue-500  border-blue-500  p-2"
                            id="addCardButton">
                            <i class="fa-solid fa-plus p-1"></i>
                            <p>Agregar método de pago x</p>
                        </button>
                    </div>
                    <div id="addCard" class="hidden">
                        <form  class="px-8 pt-6 pb-8 mb-4   rounded"  action="{{ route('GuardarTarjeta') }}" method="POST">
                            @csrf 
                            <div class="mb-4 md:flex md:justify-between ">
                                <div class="mb-4 md:mb-0  w-full lg:w-1/2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="owner">
                                        Propietario
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="owner" name="owner" type="text" placeholder="Propietario"
                                        value="{{ old('owner') }}" />
                                </div>
                                <div class="mb-4 md:mb-0 w-full md:ml-2 lg:w-1/2">
                                    <label class="block mb-2 text-sm font-bold  dark:text-white" for="num_tarjeta">
                                        Número De Tarjeta
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="num_tarjeta" name="num_tarjeta" type="text"
                                        placeholder="Número Tarjeta" value="{{ old('num_tarjeta') }}" />
                                </div>
                            </div>
                            <div class="mb-6 flex justify-center md:flex md:justify-start">
                                <div class="md:w-1/2 md:flex md:justify-start flex flex-wrap w-1/2  md:mt-0">
                                    <div class="mb-4 w-1/3 md:mb-0 md:w-4/12 ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="mes">
                                            Mes
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="mes" name="mes" type="text" placeholder="11"
                                            value="{{ old('mes') }}" /><!--min="2024-01" max="2025-12"-->
                                    </div>
                                    <div class="mb-4 w-1/3 md:mb-0 md:w-2/12  flex items-end justify-center  ">
                                        <p class="pb-4">/</p>
                                    </div>
                                    <div class="mb-4 w-1/3 md:mb-0  md:w-4/12  ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="anio">
                                            Año
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="anio" name="anio" type="text" placeholder="24"
                                            value="{{ old('anio') }}" /><!--min="2024-01" max="2025-12"-->
                                    </div>
                                </div>
                                <div class="mb-4  w-1/2 ml-2 md:mb-0 md:w-1/4 md:ml-2 ">
                                    <div class="mb-4  md:mb-0    ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="cvv">
                                            Código De Seguridad
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="cvv" name="cvv" type="password" placeholder="###"
                                            /><!--min="2024-01" max="2025-12"-->
                                    </div>
                                </div>
                            </div>


                            <div class=" text-center">
                                <div class="w-full flex flex-col items-center pt-2">
                                    <button type="submit"
                                        class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                        Agregar método de pago
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



        </div>


        <div id="edit-card-modal" class="hidden ">
            <div class="fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-md">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="put">
                                Editar Tarjeta
                            </h3>
                            <button type="button"
                                class="end-2.5  bg-transparent text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="edit-card-modal" onclick="closeModal()">
                                <i class="fa-solid fa-xmark "></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        @if ($errors->any())
                            <div class=" ">
                                <ul class="mt-8 mx-auto w-full">
                                    @foreach ($errors->all() as $error)
                                        <div class="rounded-md flex m-2 items-center bg-blue-500 text-white text-xs px-4 py-1"
                                            role="alert">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                            </svg>
                                            <p>{{ $error }}</p>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="{{ route('ActualizarTarjeta') }}" id="edit-card-form" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <div class="mb-4  w-full ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="owner_edit">
                                            Propietario
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="owner_edit" name="owner_edit" type="text"
                                            placeholder="Propietario" value="{{ old('owner_edit') }}" />
                                        <input type="hidden" name="card_id_hidden" id="card_id_hidden"
                                            value="">
                                    </div>
                                    <div class="mb-4  w-full ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white"
                                            for="num_tarjeta_edit">
                                            Número De Tarjeta
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="num_tarjeta_edit" name="num_tarjeta_edit" type="text"
                                            placeholder="Número Tarjeta" value="{{ old('num_tarjeta') }}" />
                                    </div>
                                </div>

                                <div class="mb-6 flex justify-center md:flex md:justify-start">
                                    <div class="md:w-1/2 md:flex md:justify-start flex flex-wrap w-1/2  md:mt-0">
                                        <div class="mb-4 w-1/3 md:mb-0 md:w-4/12 ">
                                            <label class="block mb-2 text-sm font-bold  dark:text-white"
                                                for="mes_edit">
                                                Mes
                                            </label>
                                            <input
                                                class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="mes_edit" name="mes_edit" type="text" placeholder="11"
                                                value="{{ old('mes_edit') }}" /><!--min="2024-01" max="2025-12"-->
                                        </div>
                                        <div class="mb-4 w-1/3 md:mb-0 md:w-2/12  flex items-end justify-center  ">
                                            <p class="pb-4">/</p>
                                        </div>
                                        <div class="mb-4 w-1/3 md:mb-0  md:w-4/12  ">
                                            <label class="block mb-2 text-sm font-bold  dark:text-white"
                                                for="anio_edit">
                                                Año
                                            </label>
                                            <input
                                                class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="anio_edit" name="anio_edit" type="text" placeholder="24"
                                                value="{{ old('anio_edit') }}" /><!--min="2024-01" max="2025-12"-->
                                        </div>
                                    </div>
                                    <div class="mb-4  w-1/2 ml-2 md:mb-0 md:w-1/4 md:ml-2 ">
                                        <div class="mb-4  md:mb-0    ">
                                            <label class="block mb-2 text-sm font-bold  dark:text-white"
                                                for="cvv_edit">
                                                CVV
                                            </label>
                                            <input
                                                class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                                id="cvv_edit" name="cvv_edit" type="password" placeholder="###"
                                                /><!--min="2024-01" max="2025-12"-->
                                        </div>
                                    </div>
                                </div>


                                <div class=" text-center">
                                    <div class="w-full flex flex-col items-center pt-2">
                                        <button type="submit"
                                            class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-address-modal" class="hidden ">
            <div class="fixed inset-0 z-50 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-md">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white" id="put">
                                Editar Dirección
                            </h3>
                            <button type="button"
                                class="end-2.5  bg-transparent text-red-600 hover:bg-red-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="edit-card-modal" onclick="closeModalAddress()">
                                <i class="fa-solid fa-xmark "></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        @if ($errors->any())
                            <div class=" ">
                                <ul class="mt-8 mx-auto w-full">
                                    @foreach ($errors->all() as $error)
                                        <div class="rounded-md flex m-2 items-center bg-blue-500 text-white text-xs px-4 py-1"
                                            role="alert">
                                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                            </svg>
                                            <p>{{ $error }}</p>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form action="{{ route('ActualizarDireccion') }}"
                                class="px-8 pt-3  mb-4 bg_white  rounded" method="POST" id="edit_address_form"
                                name="edit_address_form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="address_id_hidden" id="address_id_hidden"
                                    value="">

                                <div class="mb-4   ">
                                    <div class="mb-4 w-full ">
                                        <label class="block mb-2 text-sm font-bold dark:text-white" for="estado_edit">
                                            Estado
                                        </label>
                                        <select
                                            class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            id="estado_edit" name="estado_edit" onchange="cambiarSelectEdit()">
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

                                    <div class="mb-4  w-full  ">
                                        <label class="block mb-2 text-sm font-bold dark:text-white"
                                            for="municipio_edit">
                                            Municipio/Delegación
                                        </label>
                                        <select
                                            class="block w-full px-3 py-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                            id="municipio_edit" name="municipio_edit">
                                            <option value="0">-
                                        </select>
                                    </div>

                                    <div class="mb-4 w-full ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white"
                                            for="colonia_edit">
                                            Colonia
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="colonia_edit" name="colonia_edit" type="text"
                                            placeholder="Colonia" />


                                    </div>
                                </div>

                                <div class="mb-6 md:flex md:justify-center">
                                    <div class="mb-4 md:mb-0 md:w-1/2 ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="cp_edit">
                                            Código Postal
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="cp_edit" name="cp_edit" type="text" placeholder="CP" />
                                    </div>
                                    <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white" for="calle_edit">
                                            Calle
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="calle_edit" name="calle_edit" type="text" placeholder="Calle" />
                                    </div>
                                </div>

                                <div class="mb-6 md:flex md:justify-center">

                                    <div class="mb-4 md:mb-0 md:w-1/2 ">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white"
                                            for="num_ext_edit">
                                            Número Exterior
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="num_ext_edit" name="num_ext_edit" type="text"
                                            placeholder="Número Exterior" />
                                    </div>
                                    <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                        <label class="block mb-2 text-sm font-bold  dark:text-white"
                                            for="num_int_edit">
                                            Número Interior
                                        </label>
                                        <input
                                            class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                            id="num_int_edit" name="num_int_edit" type="text"
                                            placeholder="Número Interior" />
                                    </div>
                                </div>
                                <div class=" text-center">
                                    <div class="w-full flex flex-col items-center pt-2">
                                        <button type="submit"
                                            class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                            Actualizar dirección
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

  

    @vite(['resources/js/form-handling.js'])

</x-app-layout>
