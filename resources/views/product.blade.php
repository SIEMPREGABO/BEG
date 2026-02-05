@section('name', $product->nombre)

<x-app-layout>

    <div class=" " style="min-height: 720px; margin-block: 40px;">
        <div class="    bg-black  bg-opacity-50 rounded-md">


            <div class="flex  mt-10" style="justify-content:space-between; margin-inline: 80px; margin-bottom: 40px;">
                {{-- <div class="mx-5 md:w-1/2 text-center md:text-center"> --}}
                    <a class="text-sm font-semibold text-gray-500 dark:text-gray-300"
                        href="{{ route('Categoria', $product->category->slug) }}">
                        <i class="fa fa-arrow-left p-2" aria-hidden="true"></i>{{ $product->category->nombre }}
                    </a>
                {{-- </div>
                <div class="mx-5 md:w-1/2 text-center md:text-center"> --}}
                    <a class="flex justify-center items-center text-sm font-semibold text-gray-500 dark:text-gray-300" href="{{ route('Catalogo') }}">
                        Catálogo
                    </a>
                {{-- </div> --}}
            </div>

            <form action="{{ route('agregar-al-carrito') }}" method="post">
                @csrf
                <div class="flex-col flex gap-4 items-center md:py-8  ">
                    <div class="product-div md:justify-center md:items-center mx-auto w-full container  "
                        >
                        <div class=" w-full aspect-square  md:w-1/2 p-5 flex justify-center items-center"
                            style="max-width: 500px; max-height: 250px;">
                            <img src="{{ asset('images/' . $product->slug . '.jpg') }}" class="rounded-lg object-cover "
                                style="max-width: 250px; max-height: 250px;" alt="{{ $product->nombre }}" />
                        </div>

                        <div class="flex-auto pb-6  md:w-1/2">

                            <div class="flex flex-wrap">
                                <h1 class="text-neon text-xl md:text-3xl  font-semibold dark:text-gray-50 mb-4">
                                    {{ $product->nombre }}
                                </h1>
                                <input type="hidden" id="nombre" name="nombre" value="{{ $product->nombre }}">
                                <input type="hidden" id="slug" name="slug" value="{{ $product->slug }}">
                                <input type="hidden" id="category" name="category"
                                    value="{{ $product->category_id }}">
                                <input type="hidden" id="ancho" name="ancho" value="{{ $product->ancho }}">
                                <input type="hidden" id="alto" name="alto" value="{{ $product->alto }}">
                                <input type="hidden" id="largo" name="largo" value="{{ $product->largo }}">
                                <input type="hidden" id="peso" name="peso" value="{{ $product->peso }}">


                            </div>
                            <div class="text-xl font-semibold mb-2 text-gray-500 dark:text-gray-300 mb-4">


                                @if ($product->variante)
                                    <p id="price" name="price" class="text-sm md:text-base">
                                        Selecciona las opciones para ver el precio
                                    </p>
                                @else
                                    <p id="price" name="price" class="mb-4 text-xl md:text-3xl">
                                        $&nbsp;{{ number_format($product->precio, 2) }}
                                    </p>
                                @endif

                                <input type="hidden" id="precio" name="precio"
                                    value="@if (!$product->variante) {{ $product->precio }} @endif">
                            </div>
                            <div class="flex-auto items-center mt-4 mb-6 text-gray-700 dark:text-gray-300">
                                <div class="flex flex-wrap space-x-2">
                                    <input type="hidden" name="product" id="product" value="{{ $product->id }}">
                                    @isset($materialEndurances)
                                        <div class="mb-4">
                                            <label for="materialEndurance"
                                                class="text-sm text-gray-500 mb-1">Material</label>
                                            <select name="materialEndurance" id="materialEndurance" onchange="getPrice()"
                                                class="">
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
                                                class="text-sm text-gray-500 mb-1">Resistencia</label>
                                            <select name="enduranceMaterial" id="enduranceMaterial" onchange="getPrice()"
                                                class="">
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
                                            <label for="material" class="text-sm text-gray-500 mb-1">Resistencia</label>
                                            <select name="material" id="material" onchange="getPrice()" class="">
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
                                            <label for="lengthWeight" class="text-sm text-gray-500 mb-1">Resistencia</label>
                                            <select name="lengthWeight" id="lengthWeight" onchange="getPrice()"
                                                class="">
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
                                            <label for="weightLength" class="text-sm text-gray-500 ">Resistencia</label>
                                            <select name="weightLength" id="weightLength" onchange="getPrice()"
                                                class="">
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
                                            <label for="weight" class="text-sm text-gray-500">Peso</label>
                                            <select name="weight" id="weight" onchange="getPrice()" class="">
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
                                            <label for="length" class="text-sm text-gray-500">Longitud</label>
                                            <select name="v" id="length" onchange="getPrice()" class="">
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
                                            <label for="size" class="text-sm text-gray-500">Tamaño</label>
                                            <select name="size" id="size" onchange="getPrice()" class="">
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
                                            <label for="wholesale" class="text-sm text-gray-500">Cantidad</label>
                                            <select name="wholesale" id="wholesale" onchange="getPrice()"
                                                class="">
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

                            </div>
                            {{-- <div class="flex m-4 justify-center text-sm font-medium">
                                <input type="submit" id="submitButton" name="submitButton"
                                    class="botones-neon-green" value="Agregar al carrito"
                                    @if ($product->variante) disabled @endif />
                            </div> --}}
                        </div>
                    </div>

                </div>
                <div class="flex m-4 justify-center text-sm font-medium">
                    <input type="submit" id="submitButton" name="submitButton" class="botones-neon-green"
                        value="Agregar al carrito" @if ($product->variante) disabled @endif />
                </div>
            </form>

        </div>
    </div>
    </div>





</x-app-layout>
