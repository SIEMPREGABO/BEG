@section('name', 'Registro')

<x-app-layout>

    <div class="mx-auto">
        <x-alert-messages />
        
        <div class="flex justify-center px-6 {{ $errors->any() ? 'py-6' : 'py-24' }}">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div class="w-full h-auto   hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('{{ asset('images/Logo-BEGN.png') }}');">
                </div>

                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-black border-2 border-neon-green p-8 rounded-lg  text-white shadow-lg box-shadow-neon" style="box-shadow: 0 0 20px var(--color-neon-green);">
                    <h3 class="py-4 text-3xl text-center text-white uppercase font-bold" style="text-shadow: 0 0 10px var(--color-neon-green), 0 0 20px var(--color-neon-green);">Crea una cuenta
                    </h3>

                    <form class="px-8 pt-6 pb-8 mb-4   rounded " method="POST"
                        action="{{ route('Registrar') }}">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="nombre_pila">
                                    Nombre (s)
                                </label>
                                <input
                                    class="w-full"
                                    id="nombre_pila" name="nombre_pila" type="text" placeholder="Nombre" value="{{ old('nombre_pila') }}"/>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="apellido_paterno">
                                    Apellido Paterno
                                </label>
                                <input
                                    class="w-full"
                                    id="apellido_paterno" name="apellido_paterno" type="text" value="{{ old('apellido_paterno') }}"
                                    placeholder="Apellido Paterno" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="apellido_materno">
                                    Apellido Materno
                                </label>
                                <input
                                    class="w-full"
                                    id="apellido_materno" name="apellido_materno" type="text"
                                    placeholder="Apellido Materno" value="{{ old('apellido_materno') }}" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="email">
                                    Correo Electrónico
                                </label>
                                <input
                                    class="w-full"
                                    id="email" name="email" type="email" placeholder="tu@example.com" value="{{ old('email') }}" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="celular">
                                    Número Celular
                                </label>
                                <input
                                    class="w-full"
                                    id="celular" name="celular" type="tel" placeholder="Celular"  value="{{ old('celular') }}"/>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white" for="password">
                                    Contraseña
                                </label>
                                <input
                                    class="w-full"
                                    id="password" name="password" type="password" placeholder="********" />
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-bold text-white"
                                    for="password_confirmation">
                                    Confirmar Contraseña
                                </label>
                                <input
                                    class="w-full"
                                    id="password_confirmation" name="password_confirmation" type="password"
                                    placeholder="********" />
                            </div>
                        </div>



                        <div class="mb-6 text-center">
                            <div class="w-full flex flex-col items-center pt-4">
                                <button type="submit"
                            class="custom-button-hover group relative flex justify-center font-bold text-white py-2 px-6 bg-black border-2 border-neon-green rounded-full hover:bg-green hover:text-green transition-all duration-300 focus:outline-none" >
                                    Registrarse
                                </button>
                            </div>
                        </div>


                        <hr class="mb-6 border-t border-gray-700" />
                        {{-- <div class="text-center mb-3">
                            <a class="inline-block text-sm text-neon-green hover:brightness-125 transition-all"
                                href="#" style="text-shadow: 0 0 8px var(--color-neon-green), 0 0 15px var(--color-neon-green);">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div> --}}
                        <div class="text-center">
                            <a class="inline-block text-sm text-neon hover:brightness-125 transition-all font-medium"
                                href="{{ route('Ingreso') }}" >
                                ¿Ya tienes una cuenta? ¡Ingresa ahora!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
  
</x-app-layout>
