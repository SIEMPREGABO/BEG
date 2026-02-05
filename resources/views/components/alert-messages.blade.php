@if ($errors->any())
    <div class="sm:px-6 lg:px-8 xl:mx-40 lg:mx-10">
        <ul class="mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
            @foreach ($errors->all() as $error)
                <div class="rounded-md flex m-2 items-center bg-red-600 border border-neon-red text-neon-red text-sm font-bold px-4 py-1"
                    role="alert">
                    <svg class=" w-4 h-4 mr-2" fill="#ff0000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
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
    <div class="sm:px-6 lg:px-8 xl:mx-40 lg:mx-10" id="success-message">
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-6xl">
            <div class="rounded-md flex m-2 items-center bg-neon-green border border-neon-green text-neon text-sm font-bold px-4 py-1"
                role="alert" style="box-shadow: 0 0 10px var(--color-neon-green);">
                <svg class=" w-4 h-4 mr-2" fill="#00ff9d" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 0C4.477 0 0 4.477 0 10s4.477 10 10 10 10-4.477 10-10S15.523 0 10 0zM7.146 13.854l-4.146-4.146a1 1 0 111.414-1.414L7 11.086l7.086-7.086a1 1 0 111.414 1.414l-8 8a1 1 0 01-1.414 0z" />
                </svg>
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif
