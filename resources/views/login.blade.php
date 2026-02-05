@section('name', 'Ingresar')

<x-app-layout>

    <div class="min-h-screen  flex flex-col justify-center py-8 sm:px-6 lg:px-8">
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
    
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            
            <div class="bg-gray-900 text-white bg-opacity-50  py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md pb-2">
                    <h2 class="mb-2 text-center text-3xl font-extrabold ">
                        Ingresa a tu cuenta
                    </h2>
                    <p class="mt-1 text-center text-sm text-gray-600 max-w">
                        O
                        <a href="{{ route('Registro') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            crea una cuenta
                        </a>
                    </p>
                </div>
                <form class="space-y-6" action="{{ route('Ingresar') }}" method="POST">
                    @csrf
                    <div class="pb-4">
                        <label for="email" class="block text-sm font-medium ">
                            Correo Electrónico
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="text"
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="tu@example.com" value="{{ old('email') }}" >
                        </div>
                    </div>
    
                    <div class="pb-4">
                        <label for="password" class="block text-sm font-medium ">
                            Contraseña
                        </label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" 
                                class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                placeholder="********">
                        </div>
                    </div>
    
                    <div class="flex items-center justify-between pb-2">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" value="{{ old('remember_me') }}">
                            <label for="remember_me" class="ml-2 block text-sm ">
                                Recuerdáme
                            </label>
                        </div>
    
                        
                        <!--div class="text-sm">
                            <a class="inline-block text-sm text-blue-500 dark:text-blue-500 align-baseline hover:text-blue-800"
                                href="#">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </div-->
                    </div>
    
                    <div class="pb-3 w-full flex flex-col items-center">  
                        <button type="submit"
                            class="group relative flex justify-center font-bold text-white py-2 px-4 hover:bg-black bg-blue-500 rounded-full  dark:bg-blue-700 dark:text-white dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline">
                            Ingresar
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</x-app-layout>