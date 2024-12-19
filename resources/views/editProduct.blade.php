@section('name', 'Editar Producto')

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

    <div class="mx-4 pt-16 md:pt-32">
        <div class="    bg-black  bg-opacity-50 rounded-md">
            <div class="md:flex md:justify-between">
                <div class="p-5 w-full md:w-1/2 text-center md:text-left">
                    <a class="text-sm font-semibold text-gray-500 dark:text-gray-300"
                        href="{{ route('ProductosAdministrador') }}"><i class="fa-solid fa-arrow-left"></i> Regresar
                    </a>
                </div>
            </div>

            <div class="  md:py-10">



                <form class="w-full text-white p-6 md:my-10 " action="{{ route('GuardarProducto') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf


                    <div class=" flex flex-wrap ">

                        <div
                            class="flex flex-wrap justify-between items-center w-full @if ($product->variante) md:w-3/6 @endif p-4">

                            <!--div class=" flex justify-between items-center w-full"-->
                            <div class=" flex items-center justify-center w-full py-2 lg:w-1/6">
                                <div class="flex items-center justify-center w-full ">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <img src="{{ asset('images/' . $product['slug'] . '.jpg') }}"
                                                class=" object-cover " height="40" width="40">

                                            <img src="{{ asset('images/' . $product['slug'] . '.jpg') }}?t={{ time() }}"
                                                class="object-cover" height="40" width="40">
                                            <p class="mb-2 text-xs text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and
                                                drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">JPG
                                                (MAX. 800x800px)</p>
                                        </div>
                                        <input id="dropzone-file" name="dropzone-file" type="file" class="hidden"
                                            accept=".jpg" />
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-col items-center justify-center w-full lg:w-1/6">
                                <label>Nombre</label>
                                <input type="text" id="nombre" name="nombre" value="{{ $product->nombre }}"
                                    class="m-4 px-1  text-black h-8 rounded-md lg:w-32  w-full" />
                            </div>
                            <div class="flex flex-col items-center justify-center w-full lg:w-1/6">
                                <label>Slug</label>
                                <input type="text" id="slug" name="slug" value="{{ $product->slug }}"
                                    class="m-4 px-1  text-black h-8 rounded-md lg:w-32 w-full" />
                            </div>
                            @if (!$product->variante)
                                <div class="flex flex-col items-center justify-center  w-full lg:w-1/6">
                                    <label>Precio</label>
                                    <input type="text" id="precio" name="precio" value="{{ $product->precio }}"
                                        class="m-4 px-1 text-black h-8 rounded-md lg:w-32 w-full" />
                                </div>
                                <div class="flex flex-col items-center justify-center  w-full lg:w-1/6">
                                    <label>Precio Mayoreo</label>
                                    <input type="text" id="precioMayoreo" placeholder="Opcional" name="precioMayoreo"
                                        class="m-4 px-1  text-black h-8 rounded-md lg:w-32 w-full"
                                        value="@if ($product->precio_mayoreo !== null) {{ $product->precio_mayoreo }} @endif" />
                                </div>
                            @endif
                            <input type="hidden" id="id_product" name="id_product" value="{{ $product->id }}" />
                            <!--/div-->
                        </div>

                        @if ($product->variante)
                            @isset($weights)
                                <div class="w-full md:w-2/6 p-4">
                                    <div class="text-2xl uppercase py-2">Pesos</div>
                                    @foreach ($weights as $weight)
                                        <label class="flex text-xs justify-between items-center py-1">
                                            <div>
                                                {{ $allWeights->firstWhere('id', $weight['weight_id'])->weight . ' ' . ($allWeights->firstWhere('id', $weight['weight_id'])->is_kg ? 'kg' : 'lb') }}
                                            </div>
                                            <div>
                                                $&nbsp;<input type="text" name="weight_{{ $weight['id'] }}"
                                                    id='weight_{{ $weight['id'] }}' value="{{ $weight['precio'] }}"
                                                    class="text-black w-10 rounded-md">
                                                @if (count($weights) > 1)
                                                    <button id="weightE" name="weightE" type="button" class=""
                                                        onclick="eliminarVariante(this.name, {{ $weight['id'] }})">
                                                        <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                    </button>
                                                @endif

                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                                <div class="w-full md:w-1/6 p-4">
                                    <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                    <select name="varianteweight" id='varianteweight'
                                        class="w-full p-2 border rounded text-black">
                                        <option value="">-</option>
                                        @foreach ($allWeights as $weight)
                                            @php
                                                $isUsed = collect($weights)->contains(
                                                    fn($item) => $item['weight_id'] === $weight->id,
                                                );
                                            @endphp
                                            @if (!$isUsed)
                                                <option value="{{ $weight->id }}">
                                                    {{ $weight->weight }} -
                                                    @if ($weight->is_kg)
                                                        kg
                                                    @else
                                                        lb
                                                    @endif
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                @endisset
                                <!--div class="w-1/5 p-4"></div-->

                                @isset($wholesales)
                                    <div class="w-full md:w-2/6 p-4">
                                        <div class="text-2xl uppercase py-2">wholesales</div>
                                        @foreach ($wholesales as $wholesale)
                                            <label class="flex text-xs justify-between items-center py-1">
                                                <div>
                                                    {{ $allWholesales->firstWhere('id', $wholesale['wholesale_id'])->wholesale }}
                                                </div>
                                                <div>
                                                    $&nbsp;<input type="text"
                                                        name="wholesale_{{ $wholesale['wholesale_id'] }}"
                                                        id='wholesale_{{ $wholesale['wholesale_id'] }}'
                                                        value="{{ $wholesale['precio'] }}"
                                                        class="text-black w-10 rounded-md">
                                                    @if (count($wholesales) > 1)
                                                        <button id="wholesaleE" name="wholesaleE" type="button"
                                                            class=""
                                                            onclick="eliminarVariante(this.name, {{ $wholesale['id'] }})">
                                                            <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                        </button>
                                                    @endif

                                                </div>
                                            </label>
                                        @endforeach

                                    </div>
                                    <div class="w-full md:w-1/6 p-4">
                                        <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                        <select name="variantewholesale" id='variantewholesale'
                                            class="w-full p-2 border rounded text-black">
                                            <option value="">-</option>
                                            @foreach ($allWholesales as $wholesale)
                                                @php
                                                    $isUsed = collect($wholesales)->contains(
                                                        fn($item) => $item['wholesale_id'] === $wholesale->id,
                                                    );
                                                @endphp
                                                @if (!$isUsed)
                                                    <option value="{{ $wholesale->id }}">
                                                        {{ $wholesale->wholesale }} -
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @endisset

                                    @isset($materials)
                                        <div class="w-full md:w-2/6 p-4">

                                            <div class="text-2xl uppercase py-2">materials</div>
                                            @foreach ($materials as $material)
                                                <label class="flex text-xs justify-between items-center py-1">
                                                    <div>
                                                        {{ $allMaterials->firstWhere('id', $material['material_id'])->material }}
                                                    </div>
                                                    <div>
                                                        $&nbsp;<input type="text"
                                                            name="material_{{ $material['id'] }}"
                                                            id='material_{{ $material['id'] }}'
                                                            value="{{ $material['precio'] }}"
                                                            class="text-black w-10 rounded-md">
                                                        @if (count($materials) > 1)
                                                            <button id="materialE" name="materialE" type="button"
                                                                class=""
                                                                onclick="eliminarVariante(this.name, {{ $material['id'] }})">
                                                                <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class="w-full md:w-1/6 p-4">

                                            <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                            <select name="variantematerial" id='variantematerial'
                                                class="w-full p-2 border rounded text-black">
                                                <option value="">-</option>
                                                @foreach ($allMaterials as $material)
                                                    @php
                                                        $isUsed = collect($materials)->contains(
                                                            fn($item) => $item['material_id'] === $material->id,
                                                        );
                                                    @endphp
                                                    @if (!$isUsed)
                                                        <option value="{{ $material->id }}">
                                                            {{ $material->material }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endisset

                                        @isset($sizes)
                                            <div class="w-full md:w-2/6 p-4">

                                                <div class="text-2xl uppercase py-2">sizes</div>
                                                @foreach ($sizes as $size)
                                                    <label class="flex text-xs justify-between items-center py-1">
                                                        <div>
                                                            {{ $allSizes->firstWhere('id', $size['size_id'])->size }}
                                                        </div>
                                                        <div>
                                                            $&nbsp;<input type="text" name="size_{{ $size['id'] }}"
                                                                id='size_{{ $size['id'] }}'
                                                                value="{{ $size['precio'] }}"
                                                                class="text-black w-10 rounded-md">
                                                            @if (count($sizes) > 1)
                                                                <button id="sizeE" name="sizeE" type="button"
                                                                    class=""
                                                                    onclick="eliminarVariante(this.name, {{ $size['id'] }})">
                                                                    <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <div class="w-full md:w-1/6 p-4">

                                                <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                                <select name="variantesize" id='variantesize'
                                                    class="w-full p-2 border rounded text-black">
                                                    <option value="">-</option>
                                                    @foreach ($allSizes as $size)
                                                        @php
                                                            $isUsed = collect($sizes)->contains(
                                                                fn($item) => $item['size_id'] === $size->id,
                                                            );
                                                        @endphp
                                                        @if (!$isUsed)
                                                            <option value="{{ $size->id }}">
                                                                {{ $size->size }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endisset

                                            @isset($materialsEndurances)
                                                <div class="w-full md:w-2/6 p-4">
                                                    <div class="text-2xl uppercase py-2">Materiales - Resistencias</div>

                                                    {{-- Mostrar combinaciones usadas --}}
                                                    @foreach ($materialsEndurances as $materialEndurance)
                                                        <label class="flex text-xs justify-between items-center py-1">
                                                            <div>
                                                                {{ $allMaterials->firstWhere('id', $materialEndurance['material_id'])->material }}
                                                                -
                                                                {{ $allEndurances->firstWhere('id', $materialEndurance['endurance_id'])->endurance }}
                                                            </div>
                                                            <div>
                                                                $&nbsp;<input type="text"
                                                                    name="materialEndurance_{{ $materialEndurance['id'] }}"
                                                                    id="materialEndurance_{{ $materialEndurance['id'] }}"
                                                                    value="{{ $materialEndurance['precio'] }}"
                                                                    class="text-black w-10 rounded-md">
                                                                @if (count($materialsEndurances) > 1)
                                                                    <button id="materialEnduranceE"
                                                                        name="materialEnduranceE" type="button"
                                                                        class=""
                                                                        onclick="eliminarVariante(this.name, {{ $materialEndurance['id'] }})">
                                                                        <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            <!--name="materialEndurance_{//{ $materialEndurance['material_id'] }}_{//{ $materialEndurance['endurance_id'] }}"
                                                            id='materialEndurance_{//{ $materialEndurance['material_id']
                                                            }}_{//{
                                                            $materialEndurance['endurance_id'] }}'
                                                            -->


                                                        </label>
                                                    @endforeach
                                                </div>
                                                <div class="w-full md:w-1/6 p-4">

                                                    {{-- Mostrar combinaciones no usadas --}}
                                                    <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                                    <select name="variantematerialEndurance"
                                                        id="variantematerialEndurance"
                                                        class="w-full p-2 border rounded text-black">
                                                        <option value="">-</option>
                                                        @foreach ($allMaterials as $material)
                                                            @foreach ($allEndurances as $endurance)
                                                                @php
                                                                    $isUsed = collect($materialsEndurances)->contains(
                                                                        fn($item) => $item['material_id'] ===
                                                                            $material->id &&
                                                                            $item['endurance_id'] === $endurance->id,
                                                                    );
                                                                @endphp

                                                                @if (!$isUsed)
                                                                    <option
                                                                        value="{{ $material->id }}_{{ $endurance->id }}">
                                                                        {{ $material->material }} -
                                                                        {{ $endurance->endurance }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                @endisset

                                                @isset($lengths)
                                                    <div class="w-full md:w-2/6 p-4">

                                                        <div class="text-2xl uppercase py-2">lengths</div>
                                                        @foreach ($lengths as $length)
                                                            <label class="flex text-xs justify-between items-center py-1">
                                                                <div>
                                                                    {{ $allLengths->firstWhere('id', $length['length_id'])->length }}
                                                                </div>
                                                                <div>
                                                                    $&nbsp;<input type="text"
                                                                        name="length_{{ $length['id'] }}"
                                                                        id='length_{{ $length['id'] }}'
                                                                        value="{{ $length['precio'] }}"
                                                                        class="text-black w-10 rounded-md">
                                                                    @if (count($lengths) > 1)
                                                                        <button id="lengthE" name="lengthE"
                                                                            type="button" class=""
                                                                            onclick="eliminarVariante(this.name, {{ $length['id'] }})">
                                                                            <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                    <div class="w-full md:w-1/6 p-4">

                                                        <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                                        <select name="variantelength" id='length'
                                                            class="w-full p-2 border rounded text-black">
                                                            <option value="">-</option>
                                                            @foreach ($allLengths as $length)
                                                                @php
                                                                    $isUsed = collect($lengths)->contains(
                                                                        fn($item) => $item['length_id'] === $length->id,
                                                                    );
                                                                @endphp
                                                                @if (!$isUsed)
                                                                    <option value="{{ $length->id }}">
                                                                        {{ $length->length }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endisset


                                                    @isset($weightsLengths)
                                                        <div class="w-full md:w-2/6 p-4">
                                                            <div class="text-2xl uppercase py-2">Weights - Lenghts</div>

                                                            {{-- Mostrar combinaciones usadas --}}
                                                            @foreach ($weightsLengths as $weightLength)
                                                                <label
                                                                    class="flex text-xs justify-between items-center py-1">
                                                                    <div>
                                                                        {{ $allWeights->firstWhere('id', $weightLength['weight_id'])->weight . ' ' . ($allWeights->firstWhere('id', $weightLength['weight_id'])->is_kg ? 'kg' : 'lb') }}
                                                                        -
                                                                        {{ $allLengths->firstWhere('id', $weightLength['length_id'])->length }}
                                                                    </div>
                                                                    <div>
                                                                        $&nbsp;<input type="text"
                                                                            name="weightLength_{{ $weightLength['id'] }}"
                                                                            id="weightLength_{{ $weightLength['id'] }}"
                                                                            value="{{ $weightLength['precio'] }}"
                                                                            class="text-black w-10 rounded-md">
                                                                            @if (count($weightsLengths) > 1)
                                                                        <button id="weightLengthE" name="weightLengthE"
                                                                            type="button" class=""
                                                                            onclick="eliminarVariante(this.name, {{ $weightLength['id'] }})">
                                                                            <i class="fa-solid text-red-700 fa-x px-2"></i>
                                                                        </button>
                                                                        @endif
                                                                    </div>
                                                                    <!--
                                                                                                                                                                                                    name="weightLength_{//{ $weightLength['weight_id'] }}_{//{ $weightLength['length_id'] }}"
                                                                                                                                                                                                    id='weightLength_{//{ $weightLength['weight_id'] }}_{//{ $weightLength['length_id'] }}'
                                                                                                                                                                                                -->
                                                                </label>
                                                            @endforeach

                                                        </div>
                                                        <div class="w-full md:w-1/6 p-4">
                                                            {{-- Mostrar combinaciones no usadas --}}
                                                            <div class="text-2xl  py-2">Agregar Nueva Variante</div>
                                                            <select name="varianteweightLength" id="varianteweightLength"
                                                                class="w-full p-2 border rounded text-black">
                                                                <option value="">-</option>
                                                                @foreach ($allWeights as $weight)
                                                                    @foreach ($allLengths as $length)
                                                                        @php
                                                                            $isUsed = collect(
                                                                                $weightsLengths,
                                                                            )->contains(
                                                                                fn($item) => $item['weight_id'] ===
                                                                                    $weight->id &&
                                                                                    $item['length_id'] === $length->id,
                                                                            );
                                                                        @endphp

                                                                        @if (!$isUsed)
                                                                            <option
                                                                                value="{{ $weight->id }}_{{ $length->id }}">
                                                                                {{ $weight->weight }}
                                                                                @if ($weight->is_kg)
                                                                                    kg
                                                                                @else
                                                                                    lb
                                                                                @endif -
                                                                                {{ $length->length }}
                                                                            </option>
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </select>
                                                        @endisset
                                                        <div class="my-4">
                                                            <input type="text" id="precioVarianteNueva"
                                                                name="precioVarianteNueva"
                                                                class="w-full p-2 border rounded text-black"
                                                                placeholder="Escribe el precio">
                                                        </div>
                                                    </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-center pt-8">
                        <button type="submit"
                            class=" font-bold text-white py-2 px-4 hover:bg-black bg-black rounded-full  focus:outline-none focus:shadow-outline">
                            Actualizar información
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @vite(['resources/js/product-edit.js'])
</x-app-layout>
