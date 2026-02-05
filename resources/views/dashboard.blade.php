@section('name', 'Dashboard')

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
    <section class="  bg-black/50   my-12 rounded-md p-20 antialiased ">
        <div class=" uppercase text-xl md:text-3xl font-bold text-center pt-4 mb-5 md:my-0 text-white ">Panel de
            administrador</div>
        <div class="text-end">
            <a class="block text-blue-300 no-underline 
                hover:text-pink-500 hover:text-underline 
                h-10 p-2 md:h-auto md:p-4 transform hover:scale-105 
                duration-300 ease-in-out"
                href="{{ route('RegistrarAdmin') }}">
                Agregar Administrador
            </a>
        </div>
        <div class="md:grid md:grid-cols-5 md:grid-rows-5 md:gap-4 flex flex-wrap items-center p-4 text-white">
            <a href="{{ route('UsuariosAdministrador') }}"
                class="md:row-span-3 h-[200px] w-full flex my-4 items-center justify-center  border-2 border-white hover:bg-white hover:text-black ">
                <div class="md:text-lg text-base font-bold text-center   uppercase py-4 ">Usuarios</div>

            </a>
            <a href="{{ route('ProductosAdministrador') }}"
                class="md:col-span-2 md:row-span-3 w-full my-4  h-[200px] flex text-center items-center justify-center  border-2 border-white hover:bg-white hover:text-black ">
                <div class="md:text-lg text-base font-bold text-center   uppercase py-4 ">Productos</div>
            </a>

            <a class="md:col-span-2 md:row-span-3 w-full my-4 md:col-start-4 h-[200px] flex items-center justify-center border-2 border-white hover:bg-white hover:text-black"
                href="{{ route('PedidosAdministrador') }}">
                <div class=" md:text-lg text-base font-bold  text-center uppercase py-4">pedidos</div>


            </a>
            <a class="md:col-span-3 md:row-span-2 w-full my-4 md:row-start-4 h-[200px] flex items-center justify-center border-2 border-white hover:bg-white hover:text-black"
                href="{{ route('NotificacionesAdministrador') }}">
                <div class=" md:text-lg text-base font-bold  text-center uppercase py-4">Notificaciones</div>

            </a>
            <a href="{{ route('CodigosAdministrador') }}"
                class="md:col-span-2 md:row-span-2 w-full my-4 md:col-start-4 h-[200px] md:row-start-4 flex items-center justify-center border-2 border-white hover:bg-white hover:text-black">
                <div class=" md:text-lg text-base font-bold  text-center uppercase py-4">Códigos</div>

            </a>
        </div>
    </section>

</x-app-layout>
