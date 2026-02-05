@props(['productos', 'titulo' => 'Productos Destacados', 'id' => 'carousel-productos', 'category' => null])

<div class="my-8">


    <div class="carousel-container" id="{{ $id }}">
        <!-- Botón Anterior -->
        


        @php

            // if($categorias) {
            $clase = '';
            $textcolor = '';
            $buttonColor = ''; 
            $carouselButtonClass = '';
            switch ($category?->slug) {
                case 'Ligas':
                    $clase = 'green-theme';
                    $textcolor = 'color-green';
                    $buttonColor = 'botones-neon-green';
                    $carouselButtonClass = 'carousel-button-green';
                    break;
                case 'Banqueria-y-Maquinas':
                    $clase = 'purple-theme';
                    $textcolor = 'color-purple';
                    $buttonColor = 'botones-neon-purple';
                    $carouselButtonClass = 'carousel-button-purple';
                    break;
                case 'Funcional-CrossFit':
                    $clase = 'blue-theme';
                    $textcolor = 'color-blue';
                    $buttonColor = 'botones-neon-blue';
                    $carouselButtonClass = 'carousel-button-blue';
                    break;
                case 'Agarres-y-Cojines':
                    $clase = 'cyan-theme';
                    $textcolor = 'color-cyan';
                    $buttonColor = 'botones-neon-cyan';
                    $carouselButtonClass = 'carousel-button-cyan';
                    break;
                case 'Fitness':
                    $clase = 'box-shadow-neon-mag border-neon-mag ';
                    $textcolor = 'color-magenta';
                    $buttonColor = 'botones-neon-magenta';
                    $carouselButtonClass = 'carousel-button-magenta';
                    break;
                case 'Refacciones':
                    $clase = 'box-shadow-neon-orange border-neon-orange ';
                    $textcolor = 'color-orange';
                    $buttonColor = 'botones-neon-orange';
                    $carouselButtonClass = 'carousel-button-orange';
                    break;
                case 'Yoga':
                    $clase = 'box-shadow-neon-red border-neon-red';
                    $textcolor = 'color-red';
                    $buttonColor = 'botones-neon-red';
                    $carouselButtonClass = 'carousel-button-red';
                    break;
                case 'Straps':
                    $clase = 'box-shadow-neon-yellow border-neon-yellow';
                    $textcolor = 'color-yellow';
                    $buttonColor = 'botones-neon-yellow';
                    $carouselButtonClass = 'carousel-button-yellow';
                    break;
                default:
                    # code...
                    break;
            }
        @endphp

        <button class="carousel-button {{ $carouselButtonClass }} prev" onclick="moveCarousel('{{ $id }}', -1)">
            <i class="fas fa-chevron-left"></i>
        </button>

        <!-- Wrapper del Carrusel -->
        <div class="carousel-wrapper">
            @foreach ($productos as $index => $producto)
                <div class="carousel-item {{ $clase }}" data-index="{{ $index }}">
                    <!-- Imagen del Producto -->
                    <div class=" mb-4">
                        <img src="{{ asset('images/' . $producto->slug . '.jpg') }}" alt="{{ $producto->nombre }}"
                            class="carousel-item-image">
                    </div>

                    <!-- Información del Producto -->
                    <h3 class="carousel-item-title mb-3">{{ $producto->nombre }}</h3>

                    @if ($producto->variante)
                        <p class="text-center text-gray-400 my-3 text-sm">Varias opciones disponibles</p>
                        <a href="{{ route('Producto', $producto->slug) }}"
                            class="botones-neon-green {{ $buttonColor }} zoom-button w-full text-center block py-2">
                            Ver opciones
                        </a>
                    @else
                        <p class="carousel-item-price {{ $textcolor }} my-3">${{ number_format($producto->precio, 2) }}</p>
                        <form action="{{ route('agregar-al-carrito') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product" value="{{ $producto->id }}">
                            <input type="hidden" name="category" value="{{ $producto->category_id }}">
                            <input type="hidden" name="nombre" value="{{ $producto->nombre }}">
                            <input type="hidden" name="slug" value="{{ $producto->slug }}">
                            <input type="hidden" name="ancho" value="{{ $producto->ancho }}">
                            <input type="hidden" name="alto" value="{{ $producto->alto }}">
                            <input type="hidden" name="largo" value="{{ $producto->largo }}">
                            <input type="hidden" name="peso" value="{{ $producto->peso }}">
                            <input type="hidden" name="precio" value="{{ $producto->precio }}">

                            <button type="submit" class="botones-neon-green {{ $buttonColor }} zoom-button w-full text-center py-2">
                                Agregar al carrito
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        <!-- Botón Siguiente -->
        <button class="carousel-button {{ $carouselButtonClass }} next" onclick="moveCarousel('{{ $id }}', 1)">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>

    <!-- Indicadores -->
    <div class="carousel-indicators" id="{{ $id }}-indicators">
        <!-- Se generarán dinámicamente con JavaScript -->
    </div>
</div>

<script>
    const category = @json($category);
    console.log(category.slug)
    let claseIndicator = '';
    if(category && category.slug === 'Ligas') {
       claseIndicator = 'carousel-indicator-green';
    }else if(category && category.slug === 'Banqueria-y-Maquinas') {
        claseIndicator = 'carousel-indicator-purple';
    }else if(category && category.slug === 'Funcional-CrossFit') {
        claseIndicator = 'carousel-indicator-blue';
    }else if(category && category.slug === 'Agarres-y-Cojines') {
        claseIndicator = 'carousel-indicator-cyan';
    }else if(category && category.slug === 'Fitness') {
        claseIndicator = 'carousel-indicator-magenta';
    }else if(category && category.slug === 'Refacciones') {
        claseIndicator = 'carousel-indicator-orange';
    }else if(category && category.slug === 'Yoga') {
        claseIndicator = 'carousel-indicator-red';
    }else if(category && category.slug === 'Straps') {
        claseIndicator = 'carousel-indicator-yellow';
    }


    // Inicializar carruseles al cargar la página
    document.addEventListener('DOMContentLoaded', function() {
        initCarousel('{{ $id }}');
    });

    // Objeto para mantener el estado de cada carrusel
    if (typeof carouselStates === 'undefined') {
        var carouselStates = {};
    }

    function initCarousel(carouselId) {
        const container = document.getElementById(carouselId);
        if (!container) return;

        const wrapper = container.querySelector('.carousel-wrapper');
        const items = wrapper.querySelectorAll('.carousel-item');
        const indicatorsContainer = document.getElementById(carouselId + '-indicators');

        // Determinar items por página según el tamaño de pantalla
        let itemsPerPage = getItemsPerPage();

        // Calcular número de páginas
        const totalPages = Math.ceil(items.length / itemsPerPage);

        // Inicializar estado
        carouselStates[carouselId] = {
            currentPage: 0,
            totalPages: totalPages,
            itemsPerPage: itemsPerPage,
            wrapper: wrapper,
            items: items
        };

        // Crear indicadores
        createIndicators(carouselId, totalPages, indicatorsContainer);

        // Actualizar vista
        updateCarousel(carouselId);

        // Manejar resize
        window.addEventListener('resize', function() {
            const newItemsPerPage = getItemsPerPage();
            if (newItemsPerPage !== carouselStates[carouselId].itemsPerPage) {
                carouselStates[carouselId].itemsPerPage = newItemsPerPage;
                carouselStates[carouselId].totalPages = Math.ceil(items.length / newItemsPerPage);
                carouselStates[carouselId].currentPage = 0;
                createIndicators(carouselId, carouselStates[carouselId].totalPages, indicatorsContainer);
                updateCarousel(carouselId);
            }
        });
    }

    function getItemsPerPage() {
        const width = window.innerWidth;
        if (width < 480) return 1;
        if (width < 768) return 2;
        if (width < 1200) return 3;
        return 4;
    }

    function createIndicators(carouselId, totalPages, container) {
        container.innerHTML = '';
        for (let i = 0; i < totalPages; i++) {
            const indicator = document.createElement('div');
            indicator.className = `carousel-indicator ${claseIndicator}` + (i === 0 ? ' active' : '');
            indicator.onclick = function() {
                goToPage(carouselId, i);
            };
            container.appendChild(indicator);
        }
    }

    function moveCarousel(carouselId, direction) {
        const state = carouselStates[carouselId];
        const newPage = state.currentPage + direction;

        if (newPage >= 0 && newPage < state.totalPages) {
            state.currentPage = newPage;
            updateCarousel(carouselId);
        }
    }

    function goToPage(carouselId, pageIndex) {
        const state = carouselStates[carouselId];
        state.currentPage = pageIndex;
        updateCarousel(carouselId);
    }

    function updateCarousel(carouselId) {
        const state = carouselStates[carouselId];
        const itemWidth = state.items[0].offsetWidth;
        const gap = 24; // 1.5rem en px
        const offset = -(state.currentPage * state.itemsPerPage * (itemWidth + gap));

        state.wrapper.style.transform = `translateX(${offset}px)`;

        // Actualizar indicadores
        const indicators = document.querySelectorAll(`#${carouselId}-indicators .carousel-indicator`);
        indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === state.currentPage);
        });

        // Actualizar estado de botones
        const container = document.getElementById(carouselId);
        const prevButton = container.querySelector('.carousel-button.prev');
        const nextButton = container.querySelector('.carousel-button.next');

        prevButton.disabled = state.currentPage === 0;
        nextButton.disabled = state.currentPage === state.totalPages - 1;
    }
</script>
