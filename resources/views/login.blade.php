@section('name', 'Ingresar')

<x-app-layout>

    <div class="min-h-screen  flex flex-col justify-center py-8 sm:px-6 lg:px-8">
            <x-alert-messages />
    
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            
            <div class="bg-black text-white border-2 border-neon-green py-8 px-4 shadow-lg box-shadow-neon sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md pb-2">
                    <h2 class="mb-2 text-center text-3xl font-extrabold ">
                        Ingresa a tu cuenta
                    </h2>
                    <p class="mt-1 text-center text-sm text-gray-400 max-w">
                        O
                        <a href="{{ route('Registro') }}" class="text-neon font-medium " >
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
                            class="custom-button-hover group relative flex justify-center font-bold text-white py-2 px-6 bg-black border-2 border-neon-green rounded-full hover:bg-green hover:text-green transition-all duration-300 focus:outline-none" 
                            style="
                            
                            ">
                            Ingresar
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

</x-app-layout>