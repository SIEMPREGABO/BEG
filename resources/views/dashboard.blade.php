@section('name', 'Dashboard')

<x-app-layout>
    <x-alert-messages />
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
