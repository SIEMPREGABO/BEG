@section('name', 'Registrar administrador')

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
