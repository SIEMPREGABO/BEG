@section('name', 'Notificaciones')

<x-app-layout>
    <x-alert-messages />
    <div class="w-full mx-auto my-10 p-10 px-24 bg-black text-gray-300  bg-opacity-50 shadow-md rounded-3xl ">
        <h2 class="text-2xl font-bold mb-8 uppercase">Notificación</h2>
        <form action="{{ route('EnviarNotificacion') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block text-gray-400">Asunto</label>
                <input type="text" id="subject" name="subject"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25">

            </div>
            <div class="mb-4">
                <label for="header" class="block text-gray-400">Encabezado</label>
                <input type="text" id="header" name="header"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25">

            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-400">Cuerpo</label>
                <textarea id="body" name="body" rows="4"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"></textarea>

            </div>



            <div class="flex flex-col justify-start w-full mb-4">
                <label class="block text-gray-400">Imagen</label>
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full 
                    h-28 border-2 bg-opacity-25 border-gray-300 border-dashed 
                    rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <p class="mb-2 text-xs text-gray-500 dark:text-gray-400">
                            <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">JPG (MAX. 800x800px)</p>
                    </div>
                    <input id="dropzone-file" name="dropzone-file" type="file" class="hidden" accept=".jpg" />
                </label>
            </div>


            <div class="mb-4">
                <label for="footer" class="block text-gray-400">Pie de página</label>
                <input type="text" id="footer" name="footer"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25" value="">

            </div>

            <div class="w-full flex flex-col items-center pt-2">
                <button type="submit" class=" bg-gray-900 text-white py-2 px-4 rounded-md hover:bg-blue-600 text-xl">
                    Enviar
                </button>
            </div>
        </form>
    </div>


</x-app-layout>
