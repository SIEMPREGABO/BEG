@section('name', $product->nombre)

<x-app-layout>

    <div class="mx-4 pt-24 md:pt-32">
        <div class="    bg-black  bg-opacity-50 rounded-md">
            <div class="md:flex md:justify-between">
                <div class="p-5 w-full md:w-1/2 text-center md:text-left">
                    <a class="text-sm font-semibold text-gray-500 dark:text-gray-300"
                        href="{{ route('Categoria', $product->category->slug) }}">
                        <i class="fa fa-arrow-left p-2" aria-hidden="true"></i>{{ $product->category->nombre }}
                    </a>
                </div>
                <div class="py-5 px-10 w-full md:w-1/2 text-center md:text-right">
                    <a class="text-sm font-semibold text-gray-500 dark:text-gray-300" href="{{ route('Catalogo') }}">
                        Catálogo
                    </a>
                </div>
            </div>

            <div class="flex-col md:flex-row justify-center flex gap-4 items-center md:py-32  py-10">
                <div class="flex rounded-lg flex-col md:flex-row m-5 ">
                    <div class=" w-full  md:w-1/2 py-5 flex justify-center items-center">
                        <img src="{{ asset('images/' . $product->slug . '.jpg') }}" class="object-cover w-full h-full ">
                    </div>
                    <form class="flex-auto p-6  md:w-1/2" action="{{ route('agregar-al-carrito') }}" method="post">
                        @csrf
                        <div class="flex flex-wrap">
                            <h1 class="flex-auto text-xl md:text-3xl  font-semibold dark:text-gray-50 m-4">
                                {{ $product->nombre }}
                            </h1>
                            <input type="hidden" id="nombre" name="nombre" value="{{ $product->nombre }}">
                            <input type="hidden" id="slug" name="slug" value="{{ $product->slug }}">
                            <input type="hidden" id="category" name="category" value="{{ $product->category_id }}">
                            <div class="text-xl font-semibold mb-2 text-gray-500 dark:text-gray-300">
                                <p id="price" name="price" class="m-4 text-xl md:text-3xl">$
                                    @if ($product->variante)
                                        -
                                    @else
                                        {{ $product->precio }}
                                    @endif
                                </p>
                                <input type="hidden" id="precio" name="precio" value="@if($product->variante)@else{{ $product->precio }}@endif">
                            </div>
                        </div>
                        <div class="flex-auto items-center mt-4 mb-6 text-gray-700 dark:text-gray-300">
                            <div class="flex flex-wrap space-x-2">
                                <input type="hidden" name="product" id="product" value="{{ $product->id }}">
                                @isset($materialEndurances)
                                    <div class="mb-4">
                                        <label for="materialEndurance"
                                            class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Material:</label>
                                        <select name="materialEndurance" id="materialEndurance" onchange="getPrice()"
                                            class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                                            <option value="0"> - </option>
                                            @foreach ($materialEndurances as $materialEndurance)
                                                <option value="{{ $materialEndurance->id }}">
                                                    {{ $materialEndurance->material }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($enduranceMaterials)
                                    <div class="mb-4">
                                        <label for="enduranceMaterial"
                                            class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Resistencia:</label>
                                        <select name="enduranceMaterial" id="enduranceMaterial" onchange="getPrice()"
                                            class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                                            <option value="0"> - </option>
                                            @foreach ($enduranceMaterials as $enduranceMaterial)
                                                <option value="{{ $enduranceMaterial->id }}">
                                                    {{ $enduranceMaterial->endurance }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($materials)
                                    <div class="mb-4">
                                        <label for="material"
                                            class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Resistencia:</label>
                                        <select name="material" id="material" onchange="getPrice()"
                                            class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                                            <option value ="0"> - </option>
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}">
                                                    {{ $material->material }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($lengthsWeights)
                                    <div class="mb-4">
                                        <label for="lengthWeight"
                                            class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Resistencia:</label>
                                        <select name="lengthWeight" id="lengthWeight" onchange="getPrice()"
                                            class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                                            <option value ="0"> - </option>
                                            @foreach ($lengthsWeights as $lengthsWeight)
                                                <option value="{{ $lengthsWeight->id }}">
                                                    {{ $lengthsWeight->length }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($weightsLengths)
                                    <div class="mb-4">
                                        <label for="weightLength"
                                            class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">Resistencia:</label>
                                        <select name="weightLength" id="weightLength" onchange="getPrice()"
                                            class="block w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                                            <option value ="0"> - </option>
                                            @foreach ($weightsLengths as $weightsLength)
                                                <option value="{{ $weightsLength->id }}">
                                                    {{ $weightsLength->weight }}
                                                    @if ($weightsLength->is_kg)
                                                        kg
                                                    @else
                                                        lb
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($weights)
                                    <div class="mb-4">
                                        <label for="weight"
                                            class="block text-xl font-medium text-gray-600 dark:text-gray-300 mb-2">Peso:</label>
                                        <select name="weight" id="weight" onchange="getPrice()"
                                            class="w-full p-2 md:p-3 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value ="0"> - </option>
                                            @foreach ($weights as $weight)
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
                                @endisset
                                @isset($lengths)
                                    <div class="mb-4">
                                        <label for="length"
                                            class="block text-xl font-medium text-gray-600 dark:text-gray-300 mb-2">Longitud:</label>
                                        <select name="v" id="length" onchange="getPrice()"
                                            class="w-full p-2 md:p-3 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value ="0"> - </option>
                                            @foreach ($lengths as $length)
                                                <option value="{{ $length->id }}">
                                                    {{ $length->length }}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($sizes)
                                    <div class="mb-4">
                                        <label for="size"
                                            class="block text-xl font-medium text-gray-600 dark:text-gray-300 mb-2">Tamaño:</label>
                                        <select name="size" id="size" onchange="getPrice()"
                                            class="w-full p-2 md:p-3 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value ="0"> - </option>
                                            @foreach ($sizes as $size)
                                                <option value="{{ $size->id }}">
                                                    {{ $size->size }}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                                @isset($wholesales)<div class="mb-4">
                                        <label for="wholesale"
                                            class="block text-xl font-medium text-gray-600 dark:text-gray-300 mb-2">Cantidad:</label>
                                        <select name="wholesale" id="wholesale" onchange="getPrice()"
                                            class="w-full p-2 md:p-3 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-700 dark:bg-gray-800 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option value ="0"> - </option>
                                            @foreach ($wholesales as $wholesale)
                                                <option value="{{ $wholesale->id }}">
                                                    {{ $wholesale->wholesale }}

                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset
                            </div>
                            <div class="flex m-4 text-sm font-medium">
                                <input type="submit" id="submitButton" name="submitButton"
                                    class="py-2 px-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 
                                        text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none 
                                        focus:ring-2 focus:ring-offset-2 rounded-lg "
                                    value="Agregar al carrito" 
                                    @if ($product->variante) disabled @endif />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getPrice(); // Llama a la función cuando la página termine de cargarse
        });
    </script>

    

</x-app-layout>
