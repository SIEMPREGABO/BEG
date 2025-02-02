@section('name', 'Contacto')

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
    <div class=" container mx-auto  pt-16 md:pt-36 ">
        <div class=" shadow-sm  ">
            <section class="w-full flex flex-col items-center pt-5 ">
                <div
                    class=" mx-auto my-2 items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-5xl">
                    <span
                        class="bg-clip-text uppercase text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                        Nuestra historia
                    </span>
                </div>


                <div class="w-full">
                    <article class="flex flex-col px-5 md:px-0 my-4">
                        <p>Fundada el 9 de abril del 2015 a partir de una idea de crear diferentes variantes con
                            implementos en el entrenamiento deportivo.</p>
                    </article>
                </div>
            </section>

            <div class="md:flex-row flex w-full pt-10">
                <div class="mx-auto flex flex-wrap">
                    <section class="w-full flex flex-col items-center pt-5 lg:w-1/2">
                        <div
                            class=" mx-auto my-2 items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-5xl">
                            <span
                                class="bg-clip-text uppercase text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                                vision
                            </span>
                        </div>
                        <div class="w-full">
                            <article class="flex flex-col px-5 md:px-0 my-4">
                                <p>La visión de nuestra empresa es ser lideres en equipo para gimnasio, brindando equipo
                                    de excelente calidad y accesible para el público.</p>
                            </article>
                        </div>
                    </section>
                    <section class="w-full flex flex-col items-center pt-5 lg:w-1/2">
                        <div
                            class=" mx-auto my-2 items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-5xl">
                            <span
                                class="bg-clip-text uppercase text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                                mision
                            </span>
                        </div>
                        <div class="w-full">
                            <article class="flex flex-col px-5 md:px-0 my-4">
                                <p>La mision de la empresa es promover un equipo funcional y seguro donde el consumidor
                                    quede satisfecho en cada entrenamiento.</p>
                            </article>
                        </div>
                    </section>
                </div>
            </div>


            <div class=" w-full flex flex-col items-center pt-16 ">
                <div
                    class=" mx-auto  items-center text-gray-200 no-underline hover:no-underline font-bold text-2xl lg:text-5xl">
                    <span
                        class="bg-clip-text uppercase text-transparent bg-gradient-to-r from-blue-400 via-pink-500 to-purple-500">
                        Contáctanos
                    </span>
                </div>
                <div class="mx-auto flex flex-wrap text-xs font-bold text-black uppercase no-underline my-10">
                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://www.facebook.com/share/15vYQ1FjNP/">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Erick Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/H7XD6PXHVY23P1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x "></i>
                                <p class="text-xl">Erick Marci</p>
                            </div>
                        </div>
                    </a>
                    <!--<i class="fab fa-whatsapp rounded p-4 fa-10x bg-gradient-to-r hover:text-white from-purple-800 to-blue-600 hover:from-pink-500 hover:to-purple-500 "></i>-->
                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/share/18ALwbQ51S/?mibextid=qi2Omg">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Dany Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/IXR6FQDPKWYFH1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Dany Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/carla.marci.18?mibextid=ZbWKwL">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Carla Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/VACJ6VYXDKZ4G1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Carla Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/profile.php?id=100011259979300&mibextid=ZbWKwL">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-lg">Johana Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/qr/HABYSTIDJUXIB1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-lg">Johana Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://www.facebook.com/share/1AozV1ivFs/">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Paola Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/NP4ZDJIR5GZTF1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Paola Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/profile.php?id=100053791038783&mibextid=JRoKGi">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Criss Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/ATTICVC7ADOYK1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Criss Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/profile.php?id=100018101074191&mibextid=ZbWKwL">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Angel Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/KYOD7M3EXYOMG1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Angel Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/profile.php?id=100010421532377&mibextid=ZbWKwL">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-sm">Alejandra Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/C4K2RIOC2WY7L1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-sm">Alejandra Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://www.facebook.com/share/151n1F7V86/">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-sm">Elizabeth Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/qr/UORU6W2XKJMSH1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-sm">Elizabeth Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2"
                        href="https://www.facebook.com/luis.marci.9?mibextid=ZbWKwL">
                        <div class="flex md:justify-end justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-blue-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-facebook rounded p-4 fa-10x"></i>
                                <p class="text-xl">Lizza Marci</p>
                            </div>
                        </div>
                    </a>

                    <a class="w-full md:w-1/2 md:px-5 px-2 py-2" href="https://wa.me/message/7PCXD7ZPSHOEN1">
                        <div class="flex md:justify-start justify-center items-center rounded-lg px-10">
                            <div
                                class="flex items-center hover:bg-green-400 hover:text-white rounded-lg p-4 mx-5 transition-colors duration-300 px-10">
                                <i class="fab fa-whatsapp rounded p-4 fa-10x"></i>
                                <p class="text-xl">Lizza Marci</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w-full mx-auto p-10 px-24 bg-black text-gray-300  bg-opacity-50 shadow-md rounded-3xl ">
                    <h2 class="text-2xl font-bold mb-8 uppercase">Nosotros te contáctamos</h2>
                    <form action="{{ route('Contactar') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-400">Nombre</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-400">Correo Electrónico</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"
                                value="{{ old('email') }}">

                        </div>
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-400">Número Celular</label>
                            <input type="phone" id="phone" name="phone"
                                class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"
                                value="{{ old('phone') }}">

                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-400">Asunto</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"
                                value="{{ old('subject') }}">

                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-400">Mensaje</label>
                            <textarea id="message" name="message" rows="4"
                                class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"></textarea>

                        </div>
                        <div class="w-full flex flex-col items-center pt-2">
                            <button type="submit"
                                class=" bg-gray-900 text-white py-2 px-4 rounded-md hover:bg-blue-600 text-xl">
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
