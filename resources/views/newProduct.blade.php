@section('name', 'Nuevo Producto')

<x-app-layout>

    <x-alert-messages />

    <div class="mx-4 pt-24 md:pt-32">
        <div class="    bg-black  bg-opacity-50 rounded-md">
            <div class="md:flex md:justify-between">
                <div class="p-5 w-full md:w-1/2 text-center md:text-left">
                    <a class="text-sm font-semibold text-gray-500 dark:text-gray-300"
                        href="{{ route('ProductosAdministrador') }}"><i class="fa-solid fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>

            <div class="py-6 md:py-10">



                <form class="w-full text-white p-6 md:my-10 " action="{{ route('AlmacenarProducto') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf




                    <div class="flex flex-wrap items-center justify-start w-full p-4 gap-4">
                        <!-- Dropzone -->
                        <div class="flex items-center justify-center w-full lg:w-1/6">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">Click to upload</span> or drag and drop
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">JPG (MAX. 800x800px)</p>
                                </div>
                                <input id="dropzone-file" name="dropzone-file" type="file" class="hidden"
                                    accept=".jpg" />
                            </label>
                        </div>

                        <!-- Nombre -->
                        <div class="flex flex-col items-center justify-center w-full lg:w-1/6">
                            <label class="p-2">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="nombre"
                                value="{{ old('nombre') }}" class="p-2 text-black h-8 rounded-md lg:w-32 w-full" />
                            <label class="p-2">Categoria</label>

                            <select id="category" name="category"
                                class="p-1 text-black text-sm h-8 rounded-md lg:w-32 w-full"
                                value="{{ old('category') }}">
                                <option value="">-</option>
                                <option value="1">Ligas</option>
                                <option value="2">Banquetería y Máquinas</option>
                                <option value="3">Funcional Crossfit</option>
                                <option value="4">Agarres y Cojines</option>
                                <option value="5">Fitness</option>
                                <option value="6">Refacciones</option>
                                <option value="7">Yoga</option>
                                <option value="8">Straps</option>
                            </select>
                        </div>

                        <!-- Slug -->


                        <div class="flex flex-col items-center justify-center w-full lg:w-1/6">
                            <label class="p-2">Slug</label>
                            <input type="text" id="slug" name="slug" placeholder="slug"
                                value="{{ old('slug') }}" class="p-2 text-black h-8 rounded-md lg:w-32 w-full" />
                            <!--label class="p-2">Mayoreo</label>
                            <input type="checkbox" id="mayoreo" name="mayoreo"
                                class="p-1 text-black h-4 rounded-md w-full" /-->
                        </div>

                        <!-- Variante Options -->
                        <div class="flex lg:flex-col items-center justify-center w-full lg:w-1/6">
                            <label for="variante" class="p-2">Variante</label>
                            <input type="radio" id="variante" name="variante"
                                class="text-black h-8 rounded-md w-8 p-2"
                                onclick="toggleDivs('ConVariante', 'SinVariante')" />
                            <label for="No_variante" class="p-2">No variante</label>
                            <input type="radio" id="no_variante" name="no_variante"
                                class="text-black h-8 rounded-md w-8 p-2"
                                onclick="toggleDivs('SinVariante', 'ConVariante')" />
                        </div>

                        <!-- Sin Variante -->
                        <div id="SinVariante" style="display: none;"
                            class="items-center justify-center w-full lg:w-1/5">
                            <div class="flex flex-col justify-center items-center">
                                <label class="p-2">Precio</label>
                                <input type="text" id="precio" name="precio" placeholder="$$$" value=""
                                    class="px-1 text-black h-10 rounded-md lg:w-32 w-full p-2" />
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <label class="p-2">Precio Mayoreo</label>
                                <input type="text" id="precioMayoreo" name="precioMayoreo" placeholder="Opcional"
                                    class="px-1 text-black h-10 rounded-md lg:w-32 w-full p-2" />
                            </div>
                        </div>


                        <!-- Con Variante -->
                        <div id="ConVariante" style="display: none;"
                            class="items-center justify-center w-full lg:w-1/5">
                            <div class="flex flex-col items-center justify-center w-full">

                                <label class="text-lg p-2">Tipo</label>
                                <select name="Tipo" id="Tipo"
                                    class="lg:w-32 w-full p-2 border rounded text-black"
                                    onchange="toggleVariantes(this.value)">
                                    <option value=''>-</option>
                                    <option value="material">Material</option>
                                    <option value="wholesale">Wholesale</option>
                                    <option value="size">Size</option>
                                    <option value="length">Length</option>
                                    <option value="weight">Weight</option>
                                    <option value="materialendurance">Material-Resistencia</option>
                                    <option value="weightlength">Weight-Length</option>
                                </select>
                            </div>


                            <div id="weight" style="display: none;" class="items-center justify-center w-full">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="varianteweight" id="varianteweight"
                                        class="lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allWeights as $weight)
                                            <option value="{{ $weight->id }}">
                                                {{ $weight->weight }}
                                                @if ($weight->is_kg)
                                                    kg
                                                @else
                                                    lb
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="wholesale" style="display: none;" class="items-center justify-center w-full">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="variantewholesale" id='variantewholesale'
                                        class=" lg:w-32 w-full p-2 border rounded text-black ">
                                        <option value="">-</option>
                                        @foreach ($allWholesales as $wholesale)
                                            <option value="{{ $wholesale->id }}">
                                                {{ $wholesale->wholesale }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="material" style="display: none;" class="items-center justify-center w-full">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="variantematerial" id='variantematerial'
                                        class=" lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allMaterials as $material)
                                            <option value="{{ $material->id }}">
                                                {{ $material->material }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="size" style="display: none;" class="items-center justify-center w-full">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="variantesize" id='variantesize'
                                        class="lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allSizes as $size)
                                            <option value="{{ $size->id }}">
                                                {{ $size->size }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="length" style="display: none;" class="items-center justify-center w-full">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="variantelength" id='variantelength'
                                        class="lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allLengths as $length)
                                            <option value="{{ $length->id }}">
                                                {{ $length->length }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="materialendurance" style="display: none;">
                                <div class="flex flex-col items-center justify-center w-full">
                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="variantematerialendurance" id="variantematerialendurance"
                                        class="lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allMaterials as $material)
                                            @foreach ($allEndurances as $endurance)
                                                <option value="{{ $material->id }}_{{ $endurance->id }}">
                                                    {{ $material->material }} -
                                                    {{ $endurance->endurance }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="weightlength" style="display: none;" class="">
                                <div class="flex flex-col items-center justify-center w-full">

                                    <label class="text-lg  p-2">Variante</label>
                                    <select name="varianteweightlength" id="varianteweightlength"
                                        class="lg:w-32 w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allWeights as $weight)
                                            @foreach ($allLengths as $length)
                                                <option value="{{ $weight->id }}_{{ $length->id }}">
                                                    {{ $weight->weight }}
                                                    @if ($weight->is_kg)
                                                        kg
                                                    @else
                                                        lb
                                                    @endif -
                                                    {{ $length->length }}
                                                </option>
                                            @endforeach
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div id="preciodiv" class="flex flex-col" style="display: none;">
                                <div class="flex flex-col justify-center items-center ">
                                    <label class="text-lg p-2">Precio</label>
                                    <input type="text" id="varianteprecio" name="varianteprecio"
                                        placeholder="$$$" class="lg:w-32 w-full p-2 text-black h-10 rounded-md" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center pt-8">
                        <button type="submit"
                            class=" font-bold text-white py-2 px-4 hover:bg-black bg-black rounded-full  focus:outline-none focus:shadow-outline">
                            Crear producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    
</x-app-layout>
