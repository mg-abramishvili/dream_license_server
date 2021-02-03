@extends('layouts.app')
@section('content')

            <div class="flex flex-col w-full p-8 mx-auto mt-10 border rounded-lg lg:w-2/6 md:w-1/2 md:ml-auto md:mt-0">
                <form action="/keys" method="post" enctype="multipart/form-data">@csrf
                    <div class="relative px-4 py-2 mb-4 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <label class="block">
                            <select name="programs" class="block w-full bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                                @foreach($programs as $program)
                                    <option value="{{ $program->id }}">{{ $program->title }}</option>
                                @endforeach
                            </select>
                        </label>
                    </div>
                    <div class="relative">
                        <textarea type="comment" id="comment" name="comment" placeholder="Комментарий" class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0"></textarea>
                    </div>
                    <button class="w-full px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">Добавить ключ</button>
                </form>
            </div>

@endsection