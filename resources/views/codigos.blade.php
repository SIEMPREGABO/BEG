@section('name', 'Códigos')

<x-app-layout>
    <x-alert-messages />
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
