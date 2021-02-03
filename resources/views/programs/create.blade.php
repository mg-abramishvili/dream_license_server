@extends('layouts.app')
@section('content')

    <div class="flex flex-col w-full p-8 mx-auto mt-10 border rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">
        <form action="/programs" method="post" enctype="multipart/form-data">@csrf
            <div class="relative">
                <input type="title" id="title" name="title" placeholder="Название" class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                @if ($errors->has('title'))
                    <div class="text-red-500 mb-4">
                        Укажите название
                    </div>
                @endif
            </div>
            <button class="w-full px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">Добавить</button>
        </form>
    </div>

@endsection