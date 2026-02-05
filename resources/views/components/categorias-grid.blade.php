@props(['categorias', 'titulo' => 'CATEGORIAS', 'id' => 'categorias-grid', 'category' => null])


<div class="my-0  border-gray-line ">
    {{-- <h3 class="h1-neon my-4 text-center">{{ $titulo }}</h3> --}}


    <div class="flex flex-wrap justify-center ">
        @php

            // if($categorias) {
            $clase = '';

            switch ($category?->slug) {
                case 'Ligas':
                    $clase = 'border-neon-green box-shadow-neon-green';
                    break;
                case 'Banqueria-y-Maquinas':
                    $clase = 'box-shadow-neon-purple border-neon-purple ';
                    break;
                case 'Funcional-CrossFit':
                    $clase = 'box-shadow-neon-blue border-neon-blue ';
                    break;
                case 'Agarres-y-Cojines':
                    $clase = 'box-shadow-neon-cyan border-neon-cyan ';
                    break;
                case 'Fitness':
                    $clase = 'box-shadow-neon-mag border-neon-mag ';
                    break;
                case 'Refacciones':
                    $clase = 'box-shadow-neon-orange border-neon-orange ';
                    break;
                case 'Yoga':
                    $clase = 'box-shadow-neon-red border-neon-red';
                    break;
                case 'Straps':
                    $clase = 'box-shadow-neon-yellow border-neon-yellow';
                    break;
                default:
                    # code...
                    break;
            }
        @endphp
        {{-- @if ($category)
            <p>Categoría slug: {{ $category->slug }}</p>
            <p>Categoría nombre: {{ $category->nombre }}</p>
            <p>Categoría ID: {{ $category->id }}</p>
        @endif --}}
        @foreach ($categorias as $categoria)
            <a href="{{ route('Categoria', $categoria->slug) }}"
                class="zoom-item 
                disposition-item m-4 flex 
                items-center flex-start gap-4 
                 {{ $clase }} p-2
                @if ($category->slug === $categoria->slug)
                    selected
                
                @endif" 
                 >


                @if ($categoria->slug === 'Ligas')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon  icon-tabler icons-tabler-outline icon-tabler-jump-rope">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M6 14v-6a3 3 0 1 1 6 0v8a3 3 0 0 0 6 0v-6" />
                        <path d="M16 3m0 2a2 2 0 0 1 2 -2h0a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h0a2 2 0 0 1 -2 -2z" />
                        <path d="M4 14m0 2a2 2 0 0 1 2 -2h0a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h0a2 2 0 0 1 -2 -2z" />
                    </svg>
                @elseif ($categoria->slug === 'Banqueria-y-Maquinas')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon  icon-tabler icons-tabler-outline icon-tabler-treadmill">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 3a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                        <path d="M3 14l4 1l.5 -.5" />
                        <path d="M12 18v-3l-3 -2.923l.75 -5.077" />
                        <path d="M6 10v-2l4 -1l2.5 2.5l2.5 .5" />
                        <path d="M21 22a1 1 0 0 0 -1 -1h-16a1 1 0 0 0 -1 1" />
                        <path d="M18 21l1 -11l2 -1" />
                    </svg>
                @elseif ($categoria->slug === 'Funcional-CrossFit')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-rings">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M7 15v-11" />
                        <path d="M17 15v-11" />
                        <path d="M3 4h18" />
                    </svg>
                @elseif ($categoria->slug === 'Agarres-y-Cojines')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-barbell">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M2 12h1" />
                        <path d="M6 8h-2a1 1 0 0 0 -1 1v6a1 1 0 0 0 1 1h2" />
                        <path d="M6 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z" />
                        <path d="M9 12h6" />
                        <path d="M15 7v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1 -1v-10a1 1 0 0 0 -1 -1h-1a1 1 0 0 0 -1 1z" />
                        <path d="M18 8h2a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-2" />
                        <path d="M22 12h-1" />
                    </svg>
                @elseif ($categoria->slug === 'Fitness')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-heartbeat">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                        <path d="M3 13h2l2 3l2 -6l1 3h3" />
                    </svg>
                @elseif ($categoria->slug === 'Refacciones')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                @elseif ($categoria->slug === 'Yoga')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-stretching">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M16 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                        <path d="M5 20l5 -.5l1 -2" />
                        <path d="M18 20v-5h-5.5l2.5 -6.5l-5.5 1l1.5 2" />
                    </svg>
                @elseif ($categoria->slug === 'Straps')
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-hand-grab">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 11v-3.5a1.5 1.5 0 0 1 3 0v2.5" />
                        <path d="M11 9.5v-3a1.5 1.5 0 0 1 3 0v3.5" />
                        <path d="M14 7.5a1.5 1.5 0 0 1 3 0v2.5" />
                        <path
                            d="M17 9.5a1.5 1.5 0 0 1 3 0v4.5a6 6 0 0 1 -6 6h-2h.208a6 6 0 0 1 -5.012 -2.7l-.196 -.3c-.312 -.479 -1.407 -2.388 -3.286 -5.728a1.5 1.5 0 0 1 .536 -2.022a1.867 1.867 0 0 1 2.28 .28l1.47 1.47" />
                    </svg>
                @endif

                <span>{{ $categoria->nombre }}</span>
            </a>
        @endforeach
    </div>

    <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 1rem;">
        <img src="{{ asset('images/' . $category->slug . '.png') }}" alt="Divider"
            style="max-width: 500px; 
                    width: 100%; 
                    height: auto; 
                    object-fit: cover;
                    mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
                    -webkit-mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);">
    </div>
    {{-- <div class="w-full flex justify-center items-center ">
                                    <button type="submit"
                                        class="bg-black hover:bg-white hover:text-black text-white font-bold my-1 py-1 px-4 rounded-full">
                                        Filtrar
                                    </button>
                                </div> --}}
</div>
