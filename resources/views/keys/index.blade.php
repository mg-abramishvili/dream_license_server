@extends('layouts.app')
@section('content')

    <div class="flex flex-wrap w-full">
        <div class="inline-flex w-1/2">
            <h1 class="text-3xl mt-0 mb-3">Боевые ключи</h1>
            <br>
            <span>Всего: {{ count($keys->where("fortest", 'prod')) }} | Ожидают активации: {{ count($keys->where("fortest", 'test')) }}</span>
        </div>
        <div class="inline-flex w-1/2 justify-end">
            <a href="/keys/create" class="items-center px-8 py-2 mt-4 mb-4 mr-2 font-semibold text-white transition duration-500 ease-in-out transform bg-blue-700 border rounded-lg lg:inline-flex lg:mt-px hover:border-blue-700 hover:bg-blue-600 hover:text-white focus:ring focus:outline-none">Добавить ключ</a>
        </div>
    </div>

    <div class="w-full shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Ключ
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ПО
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Комментарий
                    </th>
                    <th scope="col" class="max-w-sm px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Параметры
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Статус
                    </th>
                    <!--<th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Удалить</span>
                    </th>-->
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($keys as $key)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-500">{{ $key->id }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">{{ $key->key }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                @foreach($key->programs as $program)
                                    {{ $program->title }}
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 max-w-sm">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $key->comment }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 max-w-sm">
                        <div class="flex items-center">
                            <div class="text-sm font-medium text-gray-900">
                                @foreach($key->parameters as $parameter)
                                    @isset($parameter->dreambox_theme)
                                        Тема: {{ $parameter->dreambox_theme }}<br>
                                    @endisset

                                    @isset($parameter->dreambox_orientation)
                                        Ориентация: {{ $parameter->dreambox_orientation }}<br>
                                    @endisset

                                    @isset($parameter->dreambox_title)
                                        Заголовок: {{ $parameter->dreambox_title }}<br>
                                    @endisset

                                    @isset($parameter->dreambox_module_photoalbums)
                                        @if($parameter->dreambox_module_photoalbums == 'y')
                                        Фотогалерея: Вкл<br>
                                        @else
                                        Фотогалерея: Выкл<br>
                                        @endif
                                    @endisset

                                    @isset($parameter->dreambox_module_videoalbums)
                                        @if($parameter->dreambox_module_videoalbums == 'y')
                                        Видеогалерея: Вкл<br>
                                        @else
                                        Видеогалерея: Выкл<br>
                                        @endif
                                    @endisset

                                    @isset($parameter->dreambox_module_news)
                                        @if($parameter->dreambox_module_news == 'y')
                                        Новости: Вкл<br>
                                        @else
                                        Новости: Выкл<br>
                                        @endif
                                    @endisset

                                    @isset($parameter->dreambox_module_routes)
                                        @if($parameter->dreambox_module_routes == 'y')
                                        Маршруты: Вкл<br>
                                        @else
                                        Маршруты: Выкл<br>
                                        @endif
                                    @endisset

                                    @isset($parameter->dreambox_module_reviews)
                                        @if($parameter->dreambox_module_reviews == 'y')
                                        Отзывы: Вкл<br>
                                        @else
                                        Отзывы: Выкл<br>
                                        @endif
                                    @endisset
                                @endforeach
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <div class="text-sm text-center justify-center font-medium text-gray-900 rounded-full px-3 py-1 @if($key->status == 'waiting') bg-yellow-200 @elseif($key->status == 'active') bg-green-200 @endif">
                                @if($key->status == 'waiting')
                                    ожидает активации
                                @elseif($key->status == 'active')
                                    активирован
                                @endif
                            </div>
                            @if($key->fortest == 'test')
                                <div class="text-xs text-center justify-center mt-2 font-medium text-gray-900 rounded-full px-3 py-1">
                                    <a href="/keys/delete/{{ $key->id }}" class="text-red-400 hover:text-red-600 border-red-400 hover:border-red-600 border-b border-dashed">Удалить ключ</a>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection