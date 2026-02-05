@section('name', 'Usuarios')

<x-app-layout>
    @vite('resources/js/app.js')
    <section class=" bg-black bg-opacity-50 my-12 rounded-md  antialiased md:my-16">
        <div class="mx-auto max-w-3xl">
            @if (isset($usuarios))
                <div class="p-5 w-full">
                    <h4 class="text-lg font-semibold  text-white text-center uppercase py-10 ">Lista de usuarios</h4>

                    @foreach ($usuarios as $usuario)
                        <div class="md:flex w-full my-5">
                            <div class="w-full  md:flex md:w-1/2  ">
                                <div
                                    class="bg-white w-full rounded-md p-4  flex flex-col justify-between leading-normal ">
                                    <div class=" ">
                                        <div class="text-sm text-gray-600 flex items-center">
                                            <i class="fa-solid fa-user p-1"></i>
                                            &nbsp; {{ $usuario->nombre_pila }} {{ $usuario->apellido_paterno }}
                                            {{ $usuario->apellido_materno }}
                                        </div>
                                        </p>

                                        <div class="text-gray-900 font-bold text-xl mb-2"> </div>
                                        <p class="text-gray-700 text-base">
                                            <i class="fa-regular fa-envelope"></i>
                                            {{ $usuario->email }}

                                        </p>

                                        <p class="text-gray-700 text-base">
                                            <i class="fa-solid fa-phone"></i>
                                            {{ $usuario->celular }}

                                        </p>
                                    </div>
                                    <div class="flex flex-wrap items-center ">

                                        <div class="text-sm w-1/2">
                                            <p class="text-gray-900 leading-none">Registro en </p>
                                            <p class="text-gray-600">{{ $usuario->created_at }}</p>
                                        </div>

                                        <div class="flex justify-end w-1/2 items-center text-black p-4">
                                            @if (!$usuario->isAdmin)
                                                <form action="{{ route('EliminarUsuario') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name='id_user' id='id_user'
                                                        value="{{ $usuario->id }}">
                                                    <button type="submit" class="text-gray-700 p-2">
                                                        <i class="fa-solid fa-trash "></i>
                                                    </button>
                                                </form>
                                            @endif


                                            <div class="px-1">{{ $usuario->id }}</div>

                                        </div>

                                        <label class="inline-flex items-center mb-5 cursor-pointer">
                                            <input 
                                            type="checkbox" 
                                            value="{{ $usuario->id }}" 
                                            class="sr-only peer" 
                                            onchange="handleCheckboxChange(this.value, this.checked)"
                                            @checked($usuario->mayorista)>
                                            <div class="relative w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            <span class="ms-3 text-sm font-medium text-gray-600">Mayorista</span>
                                        </label>

                                    </div>
                                </div>
                            </div>


                            <div class=" w-full md:w-1/2 md:flex text-white ">
                                <div class=" w-full rounded-md p-4  flex flex-col justify-between leading-normal ">
                                    @isset($usuario->latestOrder)
                                        <div class=" ">
                                            <p class="text-sm  flex items-center">
                                                Ultimo pedido
                                            </p>
                                            <div class=" font-bold text-xl mb-2"> </div>
                                            <p class=" text-base">
                                                ID: {{ $usuario->latestOrder->id }}
                                                <br>
                                                Relizado el {{ $usuario->latestOrder->created_at }}
                                            </p>

                                        </div>
                                        <div class="flex flex-wrap items-center ">

                                            <div class="text-sm w-1/2">
                                                <p class=" leading-none">Estado</p>
                                                <p class="">{{ $usuario->latestOrder->state }}</p>
                                            </div>

                                        </div>
                                    @endisset
                                </div>



                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="flex justify-center my-8 pb-8 mx-auto text-white font-sans">
                    <nav aria-label="Page navigation example ">
                        {{ $usuarios->links() }}
                    </nav>
                </div>

            @endif
        </div>
    </section>
    
</x-app-layout>
