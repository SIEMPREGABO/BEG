@section('name', 'Inicio')

<x-app-layout>

    <x-alert-messages />

    <div class="h-full ">

        
            <h1
                class="text-center mx-auto my-5 items-center text-gray-200 no-underline hover:no-underline font-bold text-5xl lg:text-7xl">
                <span
                    class="text-color-neon bg-clip-text  text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                    ELEVA TU ENTRENAMIENTO
                </span>
            </h1>

            <div class="text-center subtitle-neon ">
                Equipamiento profesional para atletas
            </div>
        

        <x-slider></x-slider>

        <div class=" container  mx-auto flex flex-wrap flex-col md:flex-row items-center mb-5">
            <!--Left Col-->

            <div
                class="  box-shadow-neon border-neon-green  flex flex-col w-full xl:w-2/5 text-center justify-center lg:items-center overflow-y-hidden">
                <h1
                    class="my-4 w-full text-color-neon text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center">
                    SUSCRÍBETE A NUESTRO BOLETÍN
                </h1>
                <!--<p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
                    Sub-hero message, not too long and not too short. Make it just right!
                </p>-->

                <form action="{{ route('Suscribirse') }}" method="POST"
                    class=" opacity-75 w-full shadow-lg rounded-lg px-8  pb-8 mb-4">
                    @csrf
                    <div class="mb-4 ">
                        <label class="block text-gray-300 py-2 font-bold mb-2" for="email">
                            Recibe descuentos exclusivos y las últimas novedades en equipamiento fitness.
                        </label>
                        <div class="flex flex-col md:flex-row gap-4">

                            <input
                                class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                                id="email" name="email" type="text" placeholder="tu@example.com" />

                            <button class="botones-green rounded flex text-center justify-center" type="submit">
                                Suscribirme
                            </button>
                        </div>
                    </div>

                   
                </form>
            </div>

            <!--Right Col-->
            <div class="w-full xl:w-3/5 mx-auto overflow-visible mt-10 lg:mt-0">
                <img class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                    src="{{ asset('images/Logo-BEGN.png') }}" alt="Evericks Gym Logo" />
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
                        class="text-color-neon bg-clip-text  text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                        Visita Nuestra Tienda
                    </span>
                </div>


                <div class="w-full border-neon-green box-shadow-neon my-5 ">
                    <article class="flex flex-col shadow px-5 md:px-0 ">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.288860698341!2d-99.06755924691133!3d19.486204265056564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1fa531e276e3f%3A0x862750a834755905!2sBy%20Evericks%20Gym!5e0!3m2!1ses-419!2smx!4v1723511558082!5m2!1ses-419!2smx"
                            class="w-full border-neon-green box-shadow-neon " height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </article>
                </div>
            </section>

        </div>
    </div>

</x-app-layout>
