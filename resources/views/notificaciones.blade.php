@section('name', 'Notificaciones')

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
    <div class="w-full mx-auto my-10 p-10 px-24 bg-black text-gray-300  bg-opacity-50 shadow-md rounded-3xl ">
        <h2 class="text-2xl font-bold mb-8 uppercase">Notificación</h2>
        <form action="{{ route('EnviarNotificacion') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="subject" class="block text-gray-400">Asunto</label>
                <input type="text" id="subject" name="subject"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25"
                    >

            </div>
            <div class="mb-4">
                <label for="header" class="block text-gray-400">Encabezado</label>
                <input type="text" id="header" name="header"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25" 
                    >

            </div>

            <div class="mb-4">
                <label for="body" class="block text-gray-400">Cuerpo</label>
                <textarea id="body" name="body" rows="4"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25" 
                    ></textarea>

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
                    <input id="dropzone-file" name="dropzone-file" type="file" class="hidden"
                        accept=".jpg" />
                </label>
            </div>

            
            <div class="mb-4">
                <label for="footer" class="block text-gray-400">Pie de página</label>
                <input type="text" id="footer" name="footer"
                    class="w-full px-3 py-2 border border-opacity-5 rounded-md bg-white bg-opacity-25" value=""
                    >

            </div>
            
            <div class="w-full flex flex-col items-center pt-2">
                <button type="submit" class=" bg-gray-900 text-white py-2 px-4 rounded-md hover:bg-blue-600 text-xl">
                    Enviar
                </button>
            </div>
        </form>
    </div>


</x-app-layout>
