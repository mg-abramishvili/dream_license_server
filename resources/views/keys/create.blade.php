@extends('layouts.app')
@section('content')

            <div class="flex flex-col w-full p-8 mx-auto mt-10 mb-6 border rounded-lg lg:w-1/1 md:w-1/2 md:ml-auto md:mt-0">
                <h1 class="text-3xl mt-0 mb-6">Новый ключ</h1>
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
                        <textarea type="comment" id="comment" name="comment" placeholder="Комментарий" class="w-full px-4 py-2 mb-4 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0" required></textarea>
                        @if ($errors->has('comment'))
                            <div class="text-red-500 mb-4">
                                Комментарий
                            </div>
                        @endif
                    </div>

                    <div id="dreambox_theme">
                        <label class="font-semibold block mb-1">Тема</label>
                        <select name="dreambox_theme" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <!--<option value="default">Стандартная 1</option>
                            <option value="nast">Стандартная 2</option>-->
                            <option value="med">Медцентр</option>
                            <option value="shkola">Школа</option>
                            <option value="muzei">Музей</option>
                            <!--<option value="detsad">Детсад</option>
                            <option value="book">Книга</option>-->
                        </select>
                    </div>

                    <div id="dreambox_orientation">
                        <label class="font-semibold block mb-1">Ориентация экрана</label>
                        <select name="dreambox_orientation" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="horizontal">Горизонтальная</option>
                            <option value="square">Квадрат</option>
                            <option value="vertical">Вертикальная</option>
                        </select>
                    </div>

                    <label class="font-semibold block mb-1">Заголовок на экране</label>
                    <input type="text" name="dreambox_title" class="w-full px-4 py-2 mb-6 mr-4 text-base text-blue-700 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0" required>

                    <div id="dreambox_module_photoalbums">
                        <label class="font-semibold block mb-1">Модуль "Фотогалерея"</label>
                        <select name="dreambox_module_photoalbums" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="n">Выкл</option>
                            <option value="y">Вкл</option>
                        </select>
                    </div>

                    <div id="dreambox_module_videoalbums">
                        <label class="font-semibold block mb-1">Модуль "Видеогалерея"</label>
                        <select name="dreambox_module_videoalbums" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="n">Выкл</option>
                            <option value="y">Вкл</option>
                        </select>
                    </div>

                    <div id="dreambox_module_news">
                        <label class="font-semibold block mb-1">Модуль "Новости"</label>
                        <select name="dreambox_module_news" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="n">Выкл</option>
                            <option value="y">Вкл</option>
                        </select>
                    </div>

                    <div id="dreambox_module_routes">
                        <label class="font-semibold block mb-1">Модуль "Маршруты"</label>
                        <select name="dreambox_module_routes" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="n">Выкл</option>
                            <option value="y">Вкл</option>
                        </select>
                    </div>

                    <div id="dreambox_module_reviews">
                        <label class="font-semibold block mb-1">Модуль "Отзывы"</label>
                        <select name="dreambox_module_reviews" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                            <option value="n">Выкл</option>
                            <option value="y">Вкл</option>
                        </select>
                    </div>

                    <label class="font-semibold block mb-1">Тип ключа</label>
                    <select name="fortest" class="block w-full mb-6 bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-white focus:ring-0">
                        <option value="test">Тестовый</option>
                        <option value="prod">Боевой</option>
                    </select>

                    <button class="w-full px-8 py-2 font-semibold text-white transition duration-500 ease-in-out transform rounded-lg shadow-xl bg-gradient-to-r from-blue-700 hover:from-blue-600 to-blue-600 hover:to-blue-700 focus:ring focus:outline-none">Добавить ключ</button>
                </form>
            </div>

            <script>
                $('select[name="programs"]').on('change', function() {
                    if($(this).find(":selected").val() === '1') {
                        $('#dreambox_theme').show();
                        $('#dreambox_orientation').show();
                        $('#dreambox_module_photoalbums').show();
                        $('#dreambox_module_videoalbums').show();
                        $('#dreambox_module_news').show();
                        $('#dreambox_module_routes').show();
                        $('#dreambox_module_reviews').show();
                        $('input[name="dreambox_title"]').val('');
                    } else if ($(this).find(":selected").val() === '2') {
                        $('#dreambox_theme').hide();
                        $('#dreambox_orientation').hide();
                        $('#dreambox_module_photoalbums').hide();
                        $('#dreambox_module_videoalbums').hide();
                        $('#dreambox_module_news').hide();
                        $('#dreambox_module_routes').hide();
                        $('#dreambox_module_reviews').hide();
                        $('input[name="dreambox_title"]').val('Navigator');
                    }
                });
            </script>

@endsection