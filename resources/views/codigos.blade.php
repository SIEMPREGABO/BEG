@section('name', 'Códigos')

<x-app-layout>
    @if ($errors->any())
    <div class=" sm:px-6 lg:px-8 xl:mx-40  lg:mx-10">
        <ul class="mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
            @foreach ($errors->all() as $error)
                <div class="rounded-md flex m-2 items-center bg-blue-500 text-white text-sm font-bold px-4 py-1"
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
@if (session('success'))
    <div class=" sm:px-6 lg:px-8 xl:mx-40  lg:mx-10" id="success-message">
        <div class=" mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
            <div class="rounded-md flex m-2 items-center bg-green-500 text-white text-sm font-bold px-4 py-1"
                role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM7.146 13.854l-4.146-4.146a1 1 0 111.414-1.414L7 11.086l7.086-7.086a1 1 0 111.414 1.414l-8 8a1 1 0 01-1.414 0z" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif
    <section class=" bg-black bg-opacity-50 my-12 rounded-md  antialiased md:my-16">
        <div class="mx-auto max-w-3xl">
           
            <div class="p-5 w-full">
                @if (isset($codigos))
                    <h4 class="text-lg font-semibold  text-white text-center uppercase py-10 ">Lista de códigos</h4>
                    @foreach ($codigos as $codigo)
                        <div class="md:flex w-full my-5">
                            <div class="w-full    ">
                                <div
                                    class="bg-white w-full rounded-md p-4  flex flex-wrap items-center text-black
                                         justify-between leading-normal ">
                                    <!--div class="text-sm text-gray-600  items-center justify-beetwen">
                                               
                                            </div-->
                                    <div class="flex items-center">
                                        <i class="fa-solid fa-percent"></i>
                                        &nbsp; Código {{ $codigo->id }}
                                    </div>
                                    {{ $codigo->code }}
                                    <select id="habilitar-{{ $codigo->id }}" name="habilitar{{ $codigo->id }}"
                                        class="">
                                        <option value="1" {{ $codigo->active == 1 ? 'selected' : '' }}>Activado
                                        </option>
                                        <option value="0" {{ $codigo->active == 0 ? 'selected' : '' }}>
                                            Desactivado</option>
                                    </select>

                                    <form action="{{ route('EliminarCodigo') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name='id_code' id='id_code' value="{{ $codigo->id }}">
                                        <button type="submit" class="text-gray-700 p-2">
                                            <i class="fa-solid fa-trash "></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <!--div id="" name="" class="w-full">
                    <form action="{//{ route('AgregarCodigo') }}" method="POST">
                        csrf
                        <button type="submit"
                            class=" w-full rounded-md p-4  flex items-center text-black
                                     justify-center leading-normal border-white border-2 border-dashed"
                            id="abrirform" name="abrirform">

                            <div class="flex items-center text-center text-white">
                                <i class="fa-solid fa-plus"></i>
                                &nbsp; Agregar
                            </div>

                        </button>
                    </form>
                </div-->

                <div id="add-code" name="add-code" class="w-full">

                    <button
                        class=" w-full rounded-md p-4  flex items-center text-black
                        justify-center leading-normal border-white border-2 border-dashed"
                        id="open-form-code" name="open-form-code">

                        <div class="flex items-center text-center text-white">
                            <i class="fa-solid fa-plus"></i>
                            &nbsp; Agregar
                        </div>

                    </button>

                </div>

                <form action="{{ route('AgregarCodigo') }}" method="POST" id="form-code" name="form-code"
                    class="w-full hidden">
                    @csrf
                    <div
                        class="bg-gray-500 bg-opacity-50  w-full flex-col rounded-md p-4  md:flex md:flex-row items-center text-gray-800 
                             md:justify-between  ">

                        <div class=" md:flex md:flex-col md:items-start">
                            <label class="text font-bold">Nombre</label>
                            <input type="text" name="code" id="code"
                                class="border-gray-500 bg-gray-300 border-2 rounded-md text-sm p-1">
                        </div>

                        <div class=" md:flex md:flex-col md:items-start md:my-0 my-8">
                            <label class="text font-bold">Fecha</label>

                            <input type="date" id="caducidad" name="caducidad"
                                class=" rounded-md bg-gray-300 text-sm  text-gray-800 p-1">
                        </div>

                        
                        <select id="active" name="active" class="rounded-md bg-gray-300 text-sm text-black p-1">
                            <option value="1">Activar</option>
                            <option value="0">Desactivar</option>
                        </select>

                        <button type="submit" class="text-white p-2 m-2">
                            <i class="fa-solid fa-check"></i> </button>
                        
                    </div>
                </form>

            </div>

        </div>
    </section>
   
</x-app-layout>
