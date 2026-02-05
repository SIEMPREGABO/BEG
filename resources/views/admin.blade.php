@section('name', 'Registrar administrador')

<x-app-layout>
    <div class="mx-auto">
        <x-alert-messages />
        <div class="flex justify-center px-6 {{ $errors->any() ? 'py-6' : 'py-24' }}">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex items-center justify-center">
                <!-- Col -->
                

                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-black/50 p-5 rounded-lg lg:rounded-l-none  text-white">
                    <h3 class="py-4 text-2xl text-center text-white dark:text-white uppercase font-bold">Registra un administrador
                    </h3>

                    <form class="px-8 pt-6 pb-8 mb-4   rounded " method="POST"
                        action="{{ route('RegistroAdmin') }}">
                        @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mb-0">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="nombre_pila">
                                    Nombre (s)
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="nombre_pila" name="nombre_pila" type="text" placeholder="Nombre"
                                    value="{{ old('nombre_pila') }}" />
                            </div>
                            <div class="mb-4 md:mb-0 md:ml-2 ">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="apellido_paterno">
                                    Apellido Paterno
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="apellido_paterno" name="apellido_paterno" type="text"
                                    value="{{ old('apellido_paterno') }}" placeholder="Apellido Paterno" />
                            </div>
                            <div class="mb-4 md:mb-0 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="apellido_materno">
                                    Apellido Materno
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight  text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="apellido_materno" name="apellido_materno" type="text"
                                    placeholder="Apellido Materno" value="{{ old('apellido_materno') }}" />
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
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="celular">
                                    Número Celular
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="celular" name="celular" type="text" placeholder="Celular"
                                    value="{{ old('celular') }}" />
                            </div>
                        </div>

                        <div class="mb-4 md:flex md:justify-center">

                            <div class="mb-4 md:mb-0 md:w-1/2 ">
                                <label class="block mb-2 text-sm font-bold  dark:text-white" for="password">
                                    Contraseña
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm   text-black border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password" name="password" type="password" placeholder="********" />
                            </div>
                            <div class="mb-4 md:mb-0 md:w-1/2 md:ml-2">
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



                        <div class="mb-6 text-center">
                            <div class="w-full flex flex-col items-center pt-2">
                                <button type="submit"
                                    class=" font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                                    Registrarse
                                </button>
                            </div>
                        </div>


                        <hr class="mb-6 border-t" />
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
