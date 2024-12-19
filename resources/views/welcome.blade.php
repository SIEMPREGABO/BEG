@section('name', 'Inicio')

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
            <div class=" sm:px-6 lg:px-8 xl:mx-40  lg:mx-10"  id="success-message">
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

    <div class="h-full pt-8 md:pt-24">
        <x-slider ></x-slider>

        <div class="container  mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->

            <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
                <h1
                    class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
                    Visita
                    <p><span
                            class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 via-pink-500 to-purple-500">
                            nuestro catalogo
                        </span></p>
                    <p>y compra tu mismo!</p>
                </h1>
                <!--<p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
                    Sub-hero message, not too long and not too short. Make it just right!
                </p>-->

                <form action="{{ route('Suscribirse') }}" method="POST" class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-blue-300 py-2 font-bold mb-2" for="email">
                            ¡Suscribete! Recibe promociones y descuentos
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                            id="email" name="email" type="text" placeholder="tu@example.com" />
                    </div>

                    <div class="flex items-center justify-between pt-4">
                        <button 
                            class="bg-gradient-to-r from-purple-800 to-blue-600 hover:from-pink-500 hover:to-purple-500
                                text-white font-bold lg:py-2 lg:px-4 px-2 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                            type="submit">
                            Registrate
                        </button>
                    </div>
                </form>
            </div>

            <!--Right Col-->
            <div class="w-full xl:w-3/5 p-12 overflow-hidden">
                    <img class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                                    src="{{ asset('images/Logo_BEG.png') }}" alt="Evericks Gym Logo" />
            </div>

            <!--<div class="mx-auto md:pt-16">
                <p class="text-blue-400 font-bold pb-8 lg:pb-6 text-center">
                    Download our app:
                </p>
                <div class="flex w-full justify-center md:justify-start pb-15  lg:pb-0 fade-in">
                    <img src="App Store.svg" class="h-12 pr-12 transform hover:scale-125 duration-300 ease-in-out" />
                    <img src="Play Store.svg" class="h-12 transform hover:scale-125 duration-300 ease-in-out" />
                </div>
            </div>-->

            <section class="w-full flex flex-col items-center pt-10 ">
                <div
                    class=" mx-auto my-5 items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-5xl">
                    <span
                        class="bg-clip-text  text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                        Visita Nuestra Tienda
                    </span>
                </div>


                <div class="w-full">
                    <article class="flex flex-col shadow px-5 md:px-0 my-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.288860698341!2d-99.06755924691133!3d19.486204265056564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fa531e276e3f%3A0x862750a834755905!2sBy%20Evericks%20Gym!5e0!3m2!1ses-419!2smx!4v1723511558082!5m2!1ses-419!2smx"
                            class="w-full " height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </article>
                </div>
            </section>

        </div>
    </div>

    @vite('resources/css/slider.css')

</x-app-layout>
