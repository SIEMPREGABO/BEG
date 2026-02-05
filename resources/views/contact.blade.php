@section('name', 'Contacto')

<x-app-layout>
    <x-alert-messages />
    <div class="container mx-auto pt-10 md:pt-10 px-4">
        <div class="shadow-sm">
            <!-- Nuestra Historia -->
            <section class="w-full flex flex-col items-center pt-5">
                <div class="mx-auto my-2 items-center">
                    <h1 class="h1-neon text-center">Nuestra Historia</h1>
                </div>
                <div class="w-full max-w-4xl">
                    <article class="flex flex-col px-5 md:px-8 my-6">
                        <p class="text-white-neon text-center text-lg md:text-xl leading-relaxed">
                            Fundada el 9 de abril del 2015 a partir de una idea de crear diferentes variantes con
                            implementos en el entrenamiento deportivo.
                        </p>
                    </article>
                </div>
            </section>

            <!-- Visión y Misión -->
            <div class="flex flex-col md:flex-row w-full pt-10 gap-6 px-4 max-w-7xl mx-auto">
                <!-- Visión -->
                <section class="w-full lg:w-1/2 flex flex-col">
                    <div class="border-neon-cyan box-shadow-neon-cyan rounded-lg p-6 md:p-8 bg-black bg-opacity-60 h-full">
                        <h2 class="color-cyan text-center mb-6 text-3xl md:text-4xl uppercase" style="text-shadow: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-cyan);">Visión</h2>
                        <div class="w-full">
                            <article class="flex flex-col">
                                <p class="subtitle-neon text-center leading-relaxed">
                                    La visión de nuestra empresa es ser líderes en equipo para gimnasio, brindando equipo
                                    de excelente calidad y accesible para el público.
                                </p>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- Misión -->
                <section class="w-full lg:w-1/2 flex flex-col">
                    <div class="border-neon-purple box-shadow-neon-purple rounded-lg p-6 md:p-8 bg-black bg-opacity-60 h-full">
                        <h2 class="color-purple text-center mb-6 text-3xl md:text-4xl uppercase" style="text-shadow: 0 0 10px var(--neon-purple), 0 0 20px var(--neon-purple);">Misión</h2>
                        <div class="w-full">
                            <article class="flex flex-col">
                                <p class="subtitle-neon text-center leading-relaxed">
                                    La misión de la empresa es promover un equipo funcional y seguro donde el consumidor
                                    quede satisfecho en cada entrenamiento.
                                </p>
                            </article>
                        </div>
                    </div>
                </section>
            </div>


            <!-- Contáctanos -->
            <div class="w-full flex flex-col items-center pt-16">
                <div class="mx-auto items-center mb-10">
                    <h1 class="h1-neon text-center">Contáctanos</h1>
                </div>
                
                <!-- Grid de Contactos -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl px-4 mb-12"
                    style="gap: 20px">
                    <!-- Erick Marci -->
                    <a href="https://www.facebook.com/share/15vYQ1FjNP/" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Erick Marci</span>
                    </a>
                    <a href="https://wa.me/message/H7XD6PXHVY23P1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Erick Marci</span>
                    </a>

                    <!-- Dany Marci -->
                    <a href="https://www.facebook.com/share/18ALwbQ51S/?mibextid=qi2Omg" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Dany Marci</span>
                    </a>
                    <a href="https://wa.me/message/IXR6FQDPKWYFH1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Dany Marci</span>
                    </a>

                    <!-- Carla Marci -->
                    <a href="https://www.facebook.com/carla.marci.18?mibextid=ZbWKwL" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Carla Marci</span>
                    </a>
                    <a href="https://wa.me/message/VACJ6VYXDKZ4G1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Carla Marci</span>
                    </a>

                    <!-- Johana Marci -->
                    <a href="https://www.facebook.com/profile.php?id=100011259979300&mibextid=ZbWKwL" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Johana Marci</span>
                    </a>
                    <a href="https://wa.me/qr/HABYSTIDJUXIB1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Johana Marci</span>
                    </a>

                    <!-- Paola Marci -->
                    <a href="https://www.facebook.com/share/1AozV1ivFs/" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Paola Marci</span>
                    </a>
                    <a href="https://wa.me/message/NP4ZDJIR5GZTF1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Paola Marci</span>
                    </a>

                    <!-- Criss Marci -->
                    <a href="https://www.facebook.com/profile.php?id=100053791038783&mibextid=JRoKGi" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Criss Marci</span>
                    </a>
                    <a href="https://wa.me/message/ATTICVC7ADOYK1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Criss Marci</span>
                    </a>

                    <!-- Angel Marci -->
                    <a href="https://www.facebook.com/profile.php?id=100018101074191&mibextid=ZbWKwL" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Angel Marci</span>
                    </a>
                    <a href="https://wa.me/message/KYOD7M3EXYOMG1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Angel Marci</span>
                    </a>

                    <!-- Alejandra Marci -->
                    <a href="https://www.facebook.com/profile.php?id=100010421532377&mibextid=ZbWKwL" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon">Alejandra Marci</span>
                    </a>
                    <a href="https://wa.me/message/C4K2RIOC2WY7L1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon">Alejandra Marci</span>
                    </a>

                    <!-- Elizabeth Marci -->
                    <a href="https://www.facebook.com/share/151n1F7V86/" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon">Elizabeth Marci</span>
                    </a>
                    <a href="https://wa.me/qr/UORU6W2XKJMSH1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon">Elizabeth Marci</span>
                    </a>

                    <!-- Lizza Marci -->
                    <a href="https://www.facebook.com/luis.marci.9?mibextid=ZbWKwL" 
                       class="border-neon-blue box-shadow-neon-blue rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-facebook text-4xl color-blue"></i>
                        <span class="text-white-neon text-lg">Lizza Marci</span>
                    </a>
                    <a href="https://wa.me/message/7PCXD7ZPSHOEN1" 
                       class="border-neon-green box-shadow-neon-green rounded-lg p-4 bg-black bg-opacity-60 zoom-button flex items-center gap-4">
                        <i class="fab fa-whatsapp text-4xl color-green"></i>
                        <span class="text-white-neon text-lg">Lizza Marci</span>
                    </a>
                </div>

                <!-- Formulario de Contacto -->
                <div class="w-full max-w-4xl mx-auto p-8 md:p-10 border-neon-magenta box-shadow-neon-magenta bg-black text-gray-300 bg-opacity-70 shadow-md rounded-3xl my-10">
                    <h2 class="text-3xl md:text-4xl font-bold mb-8 uppercase text-center">
                        <span class="text-color-neon">
                            Nosotros te contáctamos
                        </span>
                    </h2>
                    <form action="{{ route('Contactar') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-white mb-2 font-medium">Nombre</label>
                            <input type="text" 
                                   id="name" 
                                   name="name"
                                   class=" "
                                   value="{{ old('name') }}"
                                   placeholder="Tu nombre completo">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-white mb-2 font-medium">Correo Electrónico</label>
                            <input type="email" 
                                   id="email" 
                                   name="email"
                                   class=" "
                                   value="{{ old('email') }}"
                                   placeholder="tu@email.com">
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="block text-white mb-2 font-medium">Número Celular</label>
                            <input type="tel" 
                                   id="phone" 
                                   name="phone"
                                   class=" "
                                   value="{{ old('phone') }}"
                                   placeholder="+52 123 456 7890">
                        </div>
                        <div class="mb-6">
                            <label for="subject" class="block text-white mb-2 font-medium">Asunto</label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject"
                                   class=" "
                                   value="{{ old('subject') }}"
                                   placeholder="Motivo de tu consulta">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-white mb-2 font-medium">Mensaje</label>
                            <textarea id="message" 
                                      name="message" 
                                      rows="5"
                                      class="  resize-vertical"
                                      placeholder="Escribe tu mensaje aquí...">{{ old('message') }}</textarea>
                        </div>
                        <div class="w-full flex flex-col items-center pt-4">
                            <button type="submit"
                                    class="botones-neon-green text-xl px-8 py-3 rounded-full font-bold uppercase transition-all duration-300">
                                Enviar Mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
