<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Сервер лицензий DreamApp</title>

        <script src="/js/jquery.js"></script>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>

        <header class="text-gray-700 bg-white border-t border-b body-font">
            <div class="container flex flex-col flex-wrap p-5 mx-auto md:items-center md:flex-row ">
                <a href="/" class="flex items-center w-32 mb-4 font-medium text-gray-900 title-font md:mb-0">
                    <img src="/img/logo-h.png">
                </a>
                <nav class="flex flex-wrap items-center justify-center text-base md:ml-auto ">
                    <a href="/keys" class="mr-5 text-sm font-semibold text-gray-600 hover:text-gray-800">Боевые ключи</a>
                    <a href="/test-keys" class="mr-5 text-sm font-semibold text-gray-600 hover:text-gray-800">Тестовые ключи</a>
                    <!--<a href="/programs" class="mr-5 text-sm font-semibold text-gray-600 hover:text-gray-800">Софт</a>-->
                </nav>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="items-center px-8 py-2 mt-4 font-semibold text-gray-700 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:inline-flex lg:mt-px hover:border-blue-800 hover:bg-blue-700 hover:text-white focus:ring focus:outline-none">Выйти</button>
                </form>
                
            </div>
        </header>
        <div class="container flex flex-col flex-wrap p-5 mx-auto md:items-center md:flex-row">
            @yield('content')
        </div>



    </body>
</html>
